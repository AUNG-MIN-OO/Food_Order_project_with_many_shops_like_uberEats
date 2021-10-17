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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/redirect',[\App\Http\Controllers\AdminController::class,'redirect']);

Route::prefix('admin')->group(function (){

    Route::get('register', [App\Http\Controllers\AdminController::class, 'showRegister'])->name('admin-register');
    Route::post('add-shop', [App\Http\Controllers\AdminController::class, 'addShop'])->name('admin-addShop');

    Route::middleware('auth')->group(function (){
        Route::get('home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin-home');
        //category CRUD routes
        Route::resource('category',\App\Http\Controllers\CategoryController::class);
        Route::get('edit-profile/{id}',[App\Http\Controllers\AdminController::class, 'editProfile'])->name('admin-profile.edit');
        Route::put('update-profile/{id}',[App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin-profile.update');
        Route::resource('shop',\App\Http\Controllers\ShopController::class);
        Route::resource('shopItem',\App\Http\Controllers\ShopItemController::class);
    });
});
