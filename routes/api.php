<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Auth Route
Route::post('login',[\App\Http\Controllers\Api\Auth\AuthController::class,'login']);
Route::post('register',[\App\Http\Controllers\Api\Auth\AuthController::class,'register']);
Route::post('forget-password',[\App\Http\Controllers\Api\Auth\AuthController::class,'sendResetLinkEmail']);
Route::post('password-reset',[\App\Http\Controllers\Api\Auth\ResetPasswordController::class,'reset']);


Route::middleware('auth:sanctum')->group(function (){
    Route::post('logout',[\App\Http\Controllers\Api\Auth\AuthController::class,'logout']);
    Route::get('rent-items',[\App\Http\Controllers\Api\ApiController::class,'rentItem']);
    Route::get('rent-item/{id}',[\App\Http\Controllers\Api\ApiController::class,'rentItemSingle']);
});
