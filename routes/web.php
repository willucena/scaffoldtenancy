<?php

use Illuminate\Support\Facades\Route;


// Not Found 404
Route::get('404', function (){
    return view('errors.404');
})->name('404.tenant');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('companies', \App\Http\Controllers\CompanyController::class);
