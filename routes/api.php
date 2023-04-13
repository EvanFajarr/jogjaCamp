<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
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



    Route::get('categorys', [CategoryController::class, 'index']);
    Route::post('categorys', [CategoryController::class, 'store']);
    Route::get('categorys/{id}', [CategoryController::class, 'show']);
    Route::get('categorys/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('categorys/{id}/edit', [CategoryController::class, 'update']);
    Route::delete('categorys/{id}/delete', [CategoryController::class, 'destroy']);



