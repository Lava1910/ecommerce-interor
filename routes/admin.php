<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        Route::view('/login', 'back.pages.admin.auth.login')->name('login');
        Route::post('login_handler',[AdminController::class,'loginHandler'])->name('login_handler');
        Route::view('/forgot-password', 'back.pages.admin.auth.forgot-password')->name('forgot-password');
        Route::post('/send-password-reset-link',[AdminController::class,'sendPasswordResetLink'])->name('send-password-reset-link');
        Route::get('/password/reset/{token}',[AdminController::class,'resetPassword'])->name('reset-password');
        Route::post('/reset-password-handler',[AdminController::class,'resetPasswordHandler'])->name('reset-password-handler');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.admin.home')->name('home');
        Route::post('/logout_handler', [AdminController::class,'logoutHandler'])->name('logout_handler');
        Route::get('/profile',[AdminController::class,'profileView'])->name('profile');
        Route::post('/change-profile-picture',[AdminController::class,'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings','back.pages.settings')->name('settings');


        //category and sub-category management
        Route::prefix('manage-categories')->name('manage-categories.')->group(function (){
            Route::controller(CategoriesController::class)->group(function (){
                Route::get('/','catsList')->name('cats-list');
                Route::get('/add-category','addCategory')->name('add-category');
                Route::post('/store-category','storeCategory')->name('store-category');
                Route::get('/edit-category','editCategory')->name('edit-category');
                Route::post('/update-category','updateCategory')->name('update-category');
            });
        });

        //project-category management
        Route::prefix('manage-project-categories')->name('manage-project-categories.')->group(function (){
            Route::controller(ProjectCategoryController::class)->group(function (){
                Route::get('/','projectCategoriesList')->name('project-categories-list');
                Route::get('/add-project-category','addProjectCategory')->name('add-project-category');
                Route::post('/store-project-category','storeProjectCategory')->name('store-project-category');
                Route::get('/edit-project-category','editProjectCategory')->name('edit-project-category');
                Route::post('/update-project-category','updateProjectCategory')->name('update-project-category');
            });
        });

        //product management
        Route::prefix('manage-products')->name('manage-products.')->group(function (){
            Route::controller(ProductController::class)->group(function (){
                Route::get('/','productsList')->name('products-list');
                Route::get('/add-product','addProduct')->name('add-product');
                Route::post('/store-product','storeProduct')->name('store-product');
                Route::get('/edit-product','editProduct')->name('edit-product');
                Route::post('/update-product','updateProduct')->name('update-product');
            });
        });

        //project management
        Route::prefix('manage-projects')->name('manage-projects.')->group(function (){
            Route::controller(ProjectController::class)->group(function (){
                Route::get('/','projectsList')->name('projects-list');
                Route::get('/add-projects','addProject')->name('add-project');
                Route::post('/store-projects','storeProject')->name('store-project');
                Route::get('/edit-projects','editProject')->name('edit-project');
                Route::post('/update-projects','updateProject')->name('update-project');
            });
        });

        //news management
        Route::prefix('manage-news')->name('manage-news.')->group(function () {
            Route::controller(NewsController::class)->group(function () {
                Route::get('/', 'newsList')->name('news-list');
                Route::get('/add-news', 'addNews')->name('add-news');
                Route::post('/store-news', 'storeNews')->name('store-news');
                Route::get('/edit-news', 'editNews')->name('edit-news');
                Route::post('/update-news', 'updateNews')->name('update-news');
            });
        });

        //users management
        Route::prefix('manage-users')->name('manage-users.')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/', 'usersList')->name('users-list');
            });
        });

        //orders management
        Route::prefix('manage-orders')->name('manage-orders.')->group(function () {
            Route::controller(OrderController::class)->group(function () {
                Route::get('/', 'ordersList')->name('orders-list');
            });
        });

        //contact management
        Route::prefix('manage-contact')->name('manage-contact.')->group(function (){
            Route::controller(ContactController::class)->group(function (){
                Route::get('/','contactList')->name('contact-list');
            });
        });
    });
});
