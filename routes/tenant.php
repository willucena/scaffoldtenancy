<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return 'Tenant';
});


Route::get('company/store', [\App\Http\Controllers\Tenant\CompanyController::class, 'store'])->name('company.store');

Route::resource('companies', \App\Http\Controllers\CompanyController::class);
