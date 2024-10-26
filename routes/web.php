<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home user
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('pembayaran', [HomeController::class, 'pembayaran'])->name('pembayaran');
Route::delete('/orders/{order}', [HomeController::class, 'destroy'])->name('orders.destroy');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');


// home admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');







Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


// product
Route::resource('products', ProductController::class);




// order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create/{product}', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

