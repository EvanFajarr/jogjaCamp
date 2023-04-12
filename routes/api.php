<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


   
});

    // Route::resource('yy', API\CategoryController::class);


    // Route::get('/users', 'App\Http\Controllers\API\CategoryController@index');

    Route::get('categorys', [CategoryController::class, 'get']);
Route::get('category/{id}', [CategoryController::class, 'get']);
Route::post('category', [CategoryController::class, 'store']);
Route::put('category/{id}', [CategoryController::class, 'update']);
Route::delete('category/{id}', [CategoryController::class, 'destroy']);
