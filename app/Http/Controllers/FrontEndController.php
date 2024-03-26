<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\NewsController;
use App\Models\Order;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Contact;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\DB;
use App\Events\CreateNewOrder;


class FrontEndController extends Controller
{
    public function home(){
        $categories = Category::orderBy("id")->get();
        $products = Product::orderBy("product_qty")->take(10)->get();
        // $products = Product::inRandomOrder()->take(10)->get();
        // $categories1 = Category::inRandomOrder()->take(10)->get();
        $project_categories = ProjectCategory::orderBy("id")->get();
        $news = News::orderBy("id")->take(3)->get();
        $data = compact("products", "project_categories", "categories","news");
        return view("front.pages.home",$data);
    }

    public function category(Category $category){
        $products = Product::where("category_id",$category->id)
            ->orderBy("created_at","desc")->paginate(12);
        return view("front.pages.category",compact("products", "category"));
    }

    public function productDiscount(){
        $products = Product::whereNotNull("product_price_after_discount")->paginate(12);
        return view("front.pages.product",compact("products"));
    }

    public function productDetail(Product $product)
    {
        $relateds = Product::where("category_id",$product->category_id)
            ->where("id","!=",$product->id)
            ->where("product_qty",">",0)
            ->inRandomOrder()
            ->limit(7)
            ->get();
        return view("front.pages.product-detail",compact("product","relateds"));
    }

    public function projectCategory(ProjectCategory $project_category){
        $projects = Project::where("project_category_id",$project_category->id)
            ->orderBy("created_at","desc")->get();
        return view("front.pages.project-category",compact("projects", "project_category"));
    }

    public function project(Project $project)
    {
        $categories = Category::where("project_category_id",$project->project_category_id)->get();
        $allProducts = collect();

        foreach ($categories as $category) {
            $categoryProducts = $category->products()->take(3)->get();
            $allProducts = $allProducts->merge($categoryProducts);
        }
        return view("front.pages.project",compact("allProducts","project"));
    }

    public function news()
    {
        $news = News::orderBy("id","desc")->paginate(3);
        return view("front.pages.news",compact("news"));
    }

    public function newsDetail(News $news)
    {
        return view("front.pages.news-detail",compact("news"));
    }

    public function addToCart(Product $product){
        $buy_qty = 1;
        $cart = session()->has("cart")?session("cart"):[];
        foreach ($cart as $item){
            if($item->id == $product->id){
                $item->buy_qty = $item->buy_qty + $buy_qty;
                session(["cart"=>$cart]);
                return redirect()->back()->with("success","Đã thêm sản phẩm vào giỏ hàng");
            }
        }
        $product->buy_qty = $buy_qty;
        $cart[] = $product;
        session(["cart"=>$cart]);
        return redirect()->back()->with("success","Đã thêm sản phẩm vào giỏ hàng");
    }

    public function removeToCart($productId){
        $cart = session()->has("cart")?session("cart"):[];
        $key = array_search($productId, array_column($cart, 'id'));
        if ($key !== false) {
            unset($cart[$key]);
            $cart = array_values($cart);
            session()->put("cart", $cart);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function checkout(){
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        $can_checkout = true;
        foreach ($cart as $item){
            if ($item->product_price_after_discount != null) {
                $subtotal += $item->product_price_after_discount * $item->buy_qty;
            } else {
                $subtotal += $item->product_price * $item->buy_qty;
            }
        }
        $total = $subtotal*1.1; // vat: 10%
        if(count($cart)==0 || !$can_checkout){
            return redirect()->to("/");
        }
        return view("front.pages.checkout",compact("cart","subtotal","total"));
    }

    public function placeOrder(Request $request){
        $request->validate([
            "full_name"=>"required|min:6",
            "address"=>"required",
            "tel"=> "required|min:9|max:11",
            "email"=>"required",
            "shipping_method"=>"required",
            "payment_method"=>"required"
        ],[
            "required"=>"Vui lòng nhập thông tin."
        ]);
        //tính toán
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        foreach ($cart as $item){
            if ($item->product_price_after_discount != null) {
                $subtotal += $item->product_price_after_discount * $item->buy_qty;
            } else {
                $subtotal += $item->product_price * $item->buy_qty;
            }
        }
        $total = $subtotal*1.1; // vat: 10%
        $order = Order::create([
            "grand_total"=>$total,
            "full_name"=>$request->get("full_name"),
            "email"=>$request->get("email"),
            "tel"=>$request->get("tel"),
            "address"=>$request->get("address"),
            "shipping_method"=>$request->get("shipping_method"),
            "payment_method"=>$request->get("payment_method")
        ]);
        foreach ($cart as $item){
            $price = isset($item->product_price_after_discount) ? $item->product_price_after_discount : $item->product_price;
            DB::table("order_products")->insert([
                "order_id"=>$order->id,
                "product_id"=>$item->id,
                "qty"=>$item->buy_qty,
                "price"=>$price
            ]);
            $product = Product::find($item->id);
            $product->update(["product_qty"=>$product->product_qty - $item->buy_qty]);
        }
        // clear cart
        session()->forget("cart");
        event(new CreateNewOrder($order));
        return redirect()->to("/");
    }

    public function searching(Request $request){
        $searchTerm = $request->input('q');

        if (empty($searchTerm)) {
            return redirect()->route('home')->with('message', 'Vui lòng nhập từ khóa tìm kiếm.');
        }

        $products = Product::where('product_name', 'like', "%$searchTerm%")->paginate(10); // Tìm kiếm tên và mô tả sản phẩm
        return view('front.pages.searching', compact('products', 'searchTerm'));
    }

    public function saveContact(Request $request) {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'message'=>'required',
        ],[
            'name.required'=>':Attribute is required',
            'address.required'=>':Attribute is required',
            'phone_number.required'=>':Attribute is required',
            'email.required'=>':Attribute is required',
            'message.required'=>':Attribute is required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone_number = $request->phone_number;
        $contact->email= $request->email;
        $contact->message = $request->message;
        $save = $contact->save();
        if ($contact->save()) {
            $successMessage = 'Contact information saved successfully!';
            return redirect()->back()->with('success', $successMessage);
        } else {
            return redirect()->back()->withErrors($contact->getErrors());
        }
    }
}
