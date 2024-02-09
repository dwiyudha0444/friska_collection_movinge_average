<?php

use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;

//home
use App\Http\Controllers\home\HomeController;

//auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//auth
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register_proses'])->name('register-proses');

//home

Route::get('/home', [HomeController::class, 'index'])->name('home');

//admin

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/administrator',AdminController::class);

//stok produks - fashion
Route::get('/stok-fashion', [ProductController::class, 'index_fashion'])->name('stok-fashion');

//stok produks - prabotan
Route::get('/stok-prabotan', [ProductController::class, 'index_prabotan'])->name('stok-prabotan');

//user
Route::get('/user', [UserController::class, 'index'])->name('user');
