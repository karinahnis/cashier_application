<?php

use App\Http\Middleware\EnsureUserIsAuthenticated;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{products}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('/login', function () {
    return view('auth.login'); 
})->name('login.form');

Route::post('/login', [AuthController::class, "login"])->name("login");




Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

