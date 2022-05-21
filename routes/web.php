<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('dashboard');
Route::get('change-password',[\App\Http\Controllers\HomeController::class,'changePassword'])->name('change.password');
Route::post('change-password',[\App\Http\Controllers\HomeController::class,'updatePassword']);
Route::prefix('user')->group(function (){
    Route::get('edit/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
    Route::put('update/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
    Route::get('delete/{id}',[\App\Http\Controllers\UserController::class,'delete'])->name('user.delete');
});


Auth::routes();

