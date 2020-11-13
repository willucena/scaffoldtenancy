<?php

use Illuminate\Support\Facades\Route;


// Not Found 404
Route::get('404', function (){
    return view('errors.404');
})->name('404.tenant');


/**
 * Auth Custon Routes
 */
Route::get( 'login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Password Reset Routes...
Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get( 'password/reset',  [\App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('password.reseting');
Route::get( 'password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');

// Registration Routes...
Route::group(['middleware' => 'not.domain.main'], function() {
    Route::get( 'register',  [\App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class,'register'])->name('');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
