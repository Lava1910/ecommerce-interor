<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        View::composer('front.layout.inc.mega-menu', function ($view) {
//            $menuController = new MenuController();
//            $data = $menuController->index();
//            $view->with('categories', $data);
//        });
        View::composer('front.layout.inc.mega-menu', function ($view) {
            $categoriesMegaMenu = Category::orderBy('id')->get();
            $projectCategoriesMegaMenu = ProjectCategory::orderBy("id","desc")->get();
            foreach ($categoriesMegaMenu as $category) {
                $category->load(['products' => function ($query) {
                    $query->take(3);
                }]);
            }

            $view->with('categoriesMegaMenu', $categoriesMegaMenu);
            $view->with('projectCategoriesMegaMenu', $projectCategoriesMegaMenu);
        });

        View::composer('front.layout.inc.header', function ($view) {
            $cart = session()->has('cart') ? session('cart') : [];
            $total = 0;
            $can_checkout = true;
            if (!empty($cart)) {
                foreach ($cart as $item) {
                    if ($item->product_price_after_discount != null) {
                        $total += $item->product_price_after_discount * $item->buy_qty;
                    } else {
                        $total += $item->product_price * $item->buy_qty;
                    }
                }
            } else {
                $can_checkout = false;
            }
            $view->with('cart', $cart);
            $view->with('total', $total);
            $view->with('can_checkout', $can_checkout);
        });
    }
}
