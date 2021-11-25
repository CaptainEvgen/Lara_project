<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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
// Route::match(['get', 'post'],'/post/all', [PostController::class,'getAll']);
// Route::get('/admin/post/all', [PostController::class,'getAllAdmin']);
// Route::match(['get', 'post'],'/post/change/{id}', [PostController::class,'change'])->where(['id' => '[\d]+']);
// Route::get('/post/delete/{id}', [PostController::class,'delete'])->where(['id' => '[\d]+']);

Route::get('/', [HomeController::class,'showHomePage'])->name('homepage');
Route::match(['get', 'post'],'/login', [UserController::class,'login'])->name('login');
Route::match(['get', 'post'],'/register', [UserController::class,'register'])->name('register');
Route::get('product/getOne/{id}', [ProductController::class,'getOneProduct'])->where(['id' => '[\d]+'])->name('getOneProduct');


Route::middleware('auth')->group(function(){
    Route::middleware('role:manager')->group(function(){
        Route::get('/manager', [AdminController::class,'showHomePage'])->name('manager');
        Route::match(['get', 'post'],'/newProduct', [ProductController::class,'newProduct'])->name('newProduct');
    });

    Route::get('/logout', [UserController::class,'logout'])->name('logout');

});
