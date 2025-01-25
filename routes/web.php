<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', action: [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

    

Route::group(['middleware' => ['auth']], function() {
    // Dashboard Admin
    Route::get('/dashboard/Admin', [AdminController::class,'index'])->name('dashboard.admin');

    // Dashboard User
    Route::get('/dashboard/user', [UserController::class,'user_dashboard'])->name('dashboard.user');

    // Products Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index') -> middleware(['permission:product_view']);
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.destroy');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
