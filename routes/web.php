<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;

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


Route::get('/', [HomeController::class,'showHomePage'])->name('homepage');
Route::match(['get', 'post'],'/login', [UserController::class,'login'])->name('login');
Route::match(['get', 'post'],'/register', [UserController::class,'register'])->name('register');
Route::get('/product/getOne/{id}', [ProductController::class,'getOneProduct'])->where(['id' => '[\d]+'])->name('getOneProduct');
Route::get('/restaurant/{id}', [ProductController::class,'getByRestaurant'])->where(['id' => '[\d]+'])->name('byRestaurant');
Route::get('/products/all', [ProductController::class,'getAllProducts'])->name('getAllProducts');// по всем ресторанам
Route::get('/restaurants', [RestaurantController::class,'getAllRestaurants'])-> name('getAllRestaurants');



Route::middleware('auth')->group(function(){

    Route::get('/logout', [UserController::class,'logout'])->name('logout');
    Route::get('/userOrders/{id}', [OrderController::class,'userOrders'])->where(['id' => '[\d]+'])->name('userOrders');
    Route::match(['get', 'post'],'/makeOrder', [OrderController::class,'makeOrder'])->name('makeOrder');
    Route::get('/cancel/{id}', [OrderController::class,'canсelOrder'])->where(['id' => '[\d]+'])->name('cancelOrder');

    Route::middleware('role:manager')->group(function(){
        Route::get('/manager', [AdminController::class,'showHomePage'])->name('manager');
        Route::match(['get', 'post'],'/newProduct', [ProductController::class,'newProduct'])->name('newProduct');
        Route::match(['get', 'post'],'/manager/allOrders/{id}', [OrderController::class,'restaurantOrders'])->name('restaurantOrders');

        Route::get('/manager/product/getAll/{id}', [AdminController::class,'getAllByRestaurant'])->where(['id' => '[\d]+'])->name('getAllByRestaurant');// по выбранному ресторанам с превью
        Route::get('/manager/product/getTable/{id}', [AdminController::class,'getTableByRestaurant'])->where(['id' => '[\d]+'])->name('getTableByRestaurant');// по выбранному ресторанам таблицой
        Route::get('/manager/delete/{id}', [ProductController::class,'deleteProduct'])->where(['id' => '[\d]+'])->name('deleteProduct');
        Route::match(['get', 'post'],'manager/update/{id?}', [ProductController::class,'updateProduct'])->where(['id' => '[\d]+'])->name('updateProduct');
        Route::get('/manager/confirm/{id}', [OrderController::class,'confirmOrder'])->where(['id' => '[\d]+'])->name('confirmOrder');
    });

});

