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
Auth::routes();

Route::middleware('auth:web')->group(function (){
    Route::middleware('role:'.ADMIN)->group(function (){
        Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('dashboard');
        Route::get('change-password',[\App\Http\Controllers\HomeController::class,'changePassword'])->name('change.password');
        Route::post('change-password',[\App\Http\Controllers\HomeController::class,'updatePassword']);
        Route::prefix('user')->group(function (){
            Route::get('edit/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
            Route::put('update/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
            Route::get('delete/{id}',[\App\Http\Controllers\UserController::class,'delete'])->name('user.delete');
        });
        Route::prefix('master-item')->group(function (){
            Route::get('/',[\App\Http\Controllers\ItemController::class,'index'])->name('item.index');
            Route::get('create',[\App\Http\Controllers\ItemController::class,'create'])->name('item.create');
            Route::post('store',[\App\Http\Controllers\ItemController::class,'store'])->name('item.store');
            Route::get('edit/{id}',[\App\Http\Controllers\ItemController::class,'edit'])->name('item.edit');
            Route::put('update/{id}',[\App\Http\Controllers\ItemController::class,'update'])->name('item.update');
            Route::get('delete/{id}',[\App\Http\Controllers\ItemController::class,'delete'])->name('item.delete');
        });
        Route::prefix('shop')->group(function (){
            Route::get('/',[\App\Http\Controllers\ShopController::class,'index'])->name('shop.index');
            Route::get('create',[\App\Http\Controllers\ShopController::class,'create'])->name('shop.create');
            Route::post('store',[\App\Http\Controllers\ShopController::class,'store'])->name('shop.store');
            Route::get('edit/{id}',[\App\Http\Controllers\ShopController::class,'edit'])->name('shop.edit');
            Route::put('update/{id}',[\App\Http\Controllers\ShopController::class,'update'])->name('shop.update');
            Route::get('delete/{id}',[\App\Http\Controllers\ShopController::class,'delete'])->name('shop.delete');
        });
        Route::prefix('shop-item')->group(function (){
            Route::get('/',[\App\Http\Controllers\ShopItemController::class,'index'])->name('shop.item.index');
            Route::get('create',[\App\Http\Controllers\ShopItemController::class,'create'])->name('shop.item.create');
            Route::post('store',[\App\Http\Controllers\ShopItemController::class,'store'])->name('shop.item.store');
            Route::get('edit/{id}',[\App\Http\Controllers\ShopItemController::class,'edit'])->name('shop.item.edit');
            Route::put('update/{id}',[\App\Http\Controllers\ShopItemController::class,'update'])->name('shop.item.update');
            Route::get('delete/{id}',[\App\Http\Controllers\ShopItemController::class,'delete'])->name('shop.item.delete');
        });
    });
});





