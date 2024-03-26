<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontEndController::class,"home"])->name('home');
Route::get('/category/{category:category_slug}', [FrontEndController::class,"category"]);
Route::get('/product-discount', [FrontEndController::class,"productDiscount"]);
Route::get('/product/{product:product_slug}', [FrontEndController::class,"productDetail"]);
Route::get('/project-category/{project_category:slug}', [FrontEndController::class,"projectCategory"]);
Route::get('/project/{project:project_slug}', [FrontEndController::class,"project"]);
Route::get('/news', [FrontEndController::class,"news"]);
Route::get('/news/{news:news_slug}', [FrontEndController::class,"newsDetail"]);
Route::get('/search', [FrontEndController::class, 'searching'])->name('searching');
Route::view('/contact-us','front.pages.contact-us');
Route::post('/save-contact',[FrontEndController::class,'saveContact'])->name('save-contact');


//    Route::view('/forgot-password', 'front.pages.auth.forgot-password')->name('forgot-password');
//    Route::post('/send-password-reset-link',[ClientController::class,'sendPasswordResetLink'])->name('send-password-reset-link');
//    Route::get('/password/reset/{token}',[ClientController::class,'resetPassword'])->name('reset-password');
//    Route::post('/reset-password-handler',[ClientController::class,'resetPasswordHandler'])->name('reset-password-handler');

Route::get('/add-to-cart/{product}', [FrontEndController::class,"addToCart"]);
Route::post('/remove-to-cart/{productId}', [FrontEndController::class,"removeToCart"]);
Route::get('/checkout', [FrontEndController::class,"checkout"]);
Route::post('/checkout', [FrontEndController::class,"placeOrder"]);


Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');
Route::view('/example-frontend','example-frontend');
