<?php

use Illuminate\Support\Facades\Route;


// Not Found 404
Route::get('404', function (){
    return view('errors.404');
})->name('404.tenant');

Route::get('/', function () {
    return view('welcome');
});
