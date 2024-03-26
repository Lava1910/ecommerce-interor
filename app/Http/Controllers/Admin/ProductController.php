<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductController extends Controller
{
    public function productsList (Request $request)
    {
        $data = [
            'pageTitle'=>'Product Management'
        ];
        return view('back.pages.admin.products-list',$data);
    }

    public function addProduct(Request $request)
    {
        $data = [
            'pageTitle'=>'Add Product'
        ];
        $categories = Category::all();
        return view('back.pages.admin.add-product',$data,compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        //validate
        $request->validate([
            'product_name'=>'required|min:5|unique:products,product_name',
            'product_material'=>'required',
            'product_author'=>'required',
            'product_thumbnail'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
            'product_image1'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
            'product_image2'=>'required|image|mimes:png,jpg,jpeg,svg,webp',
        ],[
            'product_name.required'=>':Attribute is required',
            'product_material.required'=>':Attribute is required',
            'product_author.required'=>':Attribute is required',
            'product_name.min'=>':Attribute must contains at least 5 characters',
            'product_name.unique'=>'This :Attribute is already exists',
            'product_image1.required'=>':Attribute is required',
            'product_image1.image'=>':Attribute must be an image',
            'product_image1.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'product_image2.required'=>':Attribute is required',
            'product_image2.image'=>':Attribute must be an image',
            'product_image2.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'product_thumbnail.required'=>':Attribute is required',
            'product_thumbnail.image'=>':Attribute must be an image',
            'product_thumbnail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format'
        ]);
        $product = new Product();
        if( $request->hasFile('product_thumbnail')){
            $path = 'images/products';
            $file = $request->file('product_thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();

            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $product->product_thumbnail = $filename;
        }

        if( $request->hasFile('product_image1')){
            $path = 'images/products';
            $file = $request->file('product_image1');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $product->product_image1 = $filename;
        }

        if( $request->hasFile('product_image2')){
            $path = 'images/products';
            $file = $request->file('product_image2');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!File::exists(public_path($path))){
                File::makeDirectory(public_path($path));
            }
            $upload = $file->move(public_path($path),$filename);
            $product->product_image2 = $filename;
        }

        //product info
        $product->product_name = $request->product_name;
        $product->product_material = $request->product_material;
        $product->product_author = $request->product_author;
        $product->product_price = $request->product_price;
        $product->product_qty = $request->product_qty;
        $product->category_id = $request->category_id;
        $product->product_price_after_discount = $request->product_price_after_discount;
        $product->product_slug = null;
        $save = $product->save();
        if($save){
            return redirect()->route('admin.manage-products.add-product')->with('success',
                '<b>'.ucfirst($request->product_name).'</b> product has been successfully added');
        } else {
            return redirect()->route('admin.manage-products.add-product')->with('fail',
                'Something went wrong. Try again');
        }
    }

    public function editProduct(Request $request)
    {
        $product_id = $request->id;
        $product = Product::findOrFail($product_id);
        $categories = Category::all();
        $data = [
            'pageTitle'=>'Edit Category',
            'product'=>$product
        ];
        return view('back.pages.admin.edit-product',$data,compact('categories'));
    }

    public function updateProduct(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);

        //validate
        $request->validate([
            'product_name'=>'required|min:5|unique:categories,category_name,'.$product_id,
            'product_thumbnail'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'product_image1'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'product_image2'=>'nullable|image|mimes:png,jpg,jpeg,svg,webp',
        ],[
            'product_name.required'=>':Attribute is required',
            'product_name.min'=>':Attribute must contains at least 5 characters',
            'product_name.unique'=>'This :Attribute is already exists',
            'product_thumbnail.image'=>':Attribute must be an image',
            'product_thumbnail.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'product_image1.image'=>':Attribute must be an image',
            'product_image1.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
            'product_image2.image'=>':Attribute must be an image',
            'product_image2.mimes'=>':Attribute must be in PNG, JPG, JPEG, WEBP or SVG format',
        ]);
        if( $request->hasFile('product_thumbnail')){
            $path = 'images/products';
            $file = $request->file('product_thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_product_thumbnail = $product->product_thumbnail;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_product_thumbnail))) {
                    File::delete(public_path($path . $old_product_thumbnail));
                }
            }
            $product->product_thumbnail = $filename;
        }

        if( $request->hasFile('product_image1')){
            $path = 'images/products';
            $file = $request->file('product_image1');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_product_image1 = $product->product_image1;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_product_image1))) {
                    File::delete(public_path($path . $old_product_image1));
                }
            }
            $product->product_image1 = $filename;
        }

        if( $request->hasFile('product_image2')){
            $path = 'images/products';
            $file = $request->file('product_image2');
            $filename = time().'_'.$file->getClientOriginalName();
            $old_product_image2 = $product->product_image2;
            $upload = $file->move(public_path($path),$filename);
            if($upload) {
                //delete old category image
                if (File::exists(public_path($path . $old_product_image2))) {
                    File::delete(public_path($path . $old_product_image2));
                }
            }
            $product->product_image2 = $filename;
        }

        //update category info
        $product->product_name = $request->product_name;
        $product->product_material = $request->product_material;
        $product->product_author = $request->product_author;
        $product->product_price = $request->product_price;
        $product->product_qty = $request->product_qty;
        $product->product_price_after_discount = $request->product_price_after_discount;
        $product->product_slug = null;
        $save = $product->save();
        if($save){
            return redirect()->route('admin.manage-products.edit-product',['id'=>$product_id])->with('success',
                '<b>'.ucfirst($request->product_name).'</b> product has been updated');
        } else {
            return redirect()->route('admin.manage-products.edit-product',['id'=>$product_id])->with('fail',
                'Something went wrong.');
        }

    }

    public function productDelete($product_id)
    {
        dd($product_id);
    }
}
