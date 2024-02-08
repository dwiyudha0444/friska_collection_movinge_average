<?php

use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;

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

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register_proses'])->name('register-proses');


//admin

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/administrator',AdminController::class);

//stok produks
Route::resource('/stok-prabotan',DashboardController::class);
Route::resource('/stok-fashion',DashboardController::class);

