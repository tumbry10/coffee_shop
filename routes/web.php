<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PRODUCTS
Route::get('products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('product.single');
//Add to Cart single
Route::post('products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'addtoCart'])->name('add.cart');
