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
Route::resource('/login',LoginController::class);
Route::resource('/register',RegisterController::class);


//admin
Route::resource('/administrator',AdminController::class);
Route::resource('/dashboard',DashboardController::class);
//stok produks
Route::resource('/stok-prabotan',DashboardController::class);
Route::resource('/stok-fashion',DashboardController::class);

