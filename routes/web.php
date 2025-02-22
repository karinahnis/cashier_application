<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
  
Route::get('/', function () {
    return view('welcome', ['title' => 'Home']);
})->name('home');

Route::get('/a', function() {
    return view('a', [
        "title" => "a", 
    ]);
});

Route::get('/b', function() {
    return view('b', [
        "title" => "b", 
    ]);
});

Route::get('/c', function() {
    return view('c', [
        "title" => "c", 
    ]);
});

Route::get('register', action: [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'register_action'])->name('register.action');
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.action');
Route::get('password', [LoginController::class, 'password'])->name('password');
Route::post('password', [LoginController::class, 'password_action'])->name('password.action');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.admin');

    // Dashboard User
    Route::get('/dashboard/user', [LoginController::class,'user_dashboard'])->name('dashboard.user');

    // Products Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Categories Routes
    Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

