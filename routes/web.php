<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class,'showHomePage']);
Route::get('/admin', [AdminController::class,'showHomePage']);
Route::match(['get', 'post'],'/login', [UserController::class,'login']);
Route::match(['get', 'post'],'/register', [UserController::class,'register']);

//Route::get('/register', [HomeController::class,'showHomePage']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
