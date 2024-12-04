<?php

use App\Http\Controllers\ProductController;

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
