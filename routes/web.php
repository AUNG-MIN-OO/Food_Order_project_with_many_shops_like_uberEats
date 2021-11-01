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

Route::get('/', [\App\Http\Controllers\UserController::class,'index'])->name('user_home');
Route::get('/restaurant-menu/{id}', [\App\Http\Controllers\UserController::class,'restaurantMenu']);
//search by category restaurant
Route::get('user/category-search/{id}',[\App\Http\Controllers\UserController::class,'categorySearch']);
Route::get('user/all-restaurant',[\App\Http\Controllers\UserController::class,'allRestaurant']);
Route::prefix('user')->middleware('auth')->group(function (){
    Route::get('profile',[\App\Http\Controllers\UserController::class,'profile'])->name('user-profile');
    Route::get('profile/address/{id}',[\App\Http\Controllers\UserController::class,'address'])->name('user-address');
    Route::get('profile/address-edit/{id}',[\App\Http\Controllers\UserController::class,'addressEdit']);
    Route::post('profile/address-update
',[\App\Http\Controllers\UserController::class,'addressUpdate'])->name('addressUpdate');
    //edit user profile info
    Route::get('profile-edit/{id}',[\App\Http\Controllers\UserController::class,'profileEdit']);
    Route::post('profile-update',[\App\Http\Controllers\UserController::class,'profileUpdate']);
    Route::get('order-list/{id}',[\App\Http\Controllers\UserController::class,'orderList'])->name('user-order_list');
    Route::get('order-detail/{id}',[\App\Http\Controllers\UserController::class,'orderDetail'])->name('user-order_detail');
    //add to cart
    Route::get('add-to-cart/{id}',[\App\Http\Controllers\CartController::class,'addToCart']);
    Route::post('add-to-cart',[\App\Http\Controllers\CartController::class,'addItemToCart']);
    Route::get('order-confirm',[\App\Http\Controllers\CartController::class,'orderConfirm']);
    Route::get('order-delete/{id}',[\App\Http\Controllers\CartController::class,'orderDelete']);
    Route::get('show-checkout',[\App\Http\Controllers\CartController::class,'checkOutPage'])->name('show_checkout');
    Route::get('checkout',[\App\Http\Controllers\CartController::class,'checkOut']);
    Route::get('order-success',[\App\Http\Controllers\CartController::class,'orderSuccess'])->name('order_success');
    //add to favourite
    Route::get('add-to-favourite/{id}',[\App\Http\Controllers\UserController::class,'addToFavourite']);
    Route::get('remove-from-favourite/{id}',[\App\Http\Controllers\UserController::class,'removeFromFavourite']);
    //favourite shop list
    Route::get('favourite-shops',[\App\Http\Controllers\UserController::class,'favouriteShops']);
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

        //order
        Route::get('show-order',[App\Http\Controllers\AdminController::class, 'showOrder'])->name('admin-order.show');
        Route::get('cancel-order/{id}',[App\Http\Controllers\AdminController::class, 'cancelOrder'])->name('order_destroy');
    });
});
