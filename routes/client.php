<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FrontEndController;

Route::prefix('client')->name('client.')->group(function() {

    Route::middleware(['guest:client', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'front.pages.auth.login')->name('login');
        Route::post('login_handler', [ClientController::class, 'loginHandler'])->name('login_handler');
        Route::view('/register', 'front.pages.auth.register')->name('register');
        Route::post('register_handler', [ClientController::class, 'registerHandler'])->name('register_handler');
        Route::post('logout_handler', [ClientController::class, 'logoutHandler'])->name('logout_handler');

//        Route::view('/forgot-password', 'back.pages.admin.auth.forgot-password')->name('forgot-password');
//        Route::post('/send-password-reset-link', [ClientController::class, 'sendPasswordResetLink'])->name('send-password-reset-link');
//        Route::get('/password/reset/{token}', [ClientController::class, 'resetPassword'])->name('reset-password');
//        Route::post('/reset-password-handler', [ClientController::class, 'resetPasswordHandler'])->name('reset-password-handler');
    });

    Route::middleware(['auth:client','PreventBackHistory'])->group(function () {
        Route::get('/', [FrontEndController::class,"home"])->name('home');
    });
});
