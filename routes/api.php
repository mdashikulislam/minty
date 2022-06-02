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


Route::middleware(['auth:sanctum','verified'])->group(function (){
    Route::post('logout',[\App\Http\Controllers\Api\Auth\AuthController::class,'logout']);
    Route::get('user-info',[\App\Http\Controllers\Api\Auth\AuthController::class,'userInfo']);
    Route::post('user-info-update',[\App\Http\Controllers\Api\Auth\AuthController::class,'userInfoUpdate']);
    Route::post('update-password',[\App\Http\Controllers\Api\Auth\AuthController::class,'updatePassword']);
    Route::get('rent-items',[\App\Http\Controllers\Api\ApiController::class,'rentItem']);
    Route::get('rent-item/{id}',[\App\Http\Controllers\Api\ApiController::class,'rentItemSingle']);
});
