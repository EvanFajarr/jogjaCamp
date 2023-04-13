<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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







Auth::routes();


// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', HomeController::class)->name('home');

// Route::get('/',[LoginController::class,'index']);

Route::middleware(['auth'])->group(function () {
 
    Route::resource('/category', CategoryController::class);
    Route::get('/send-email',[SendEmailController::class,'index']);
  });
