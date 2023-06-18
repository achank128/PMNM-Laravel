<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user',[UserController::class,'index']);

Route::get('/login',[UserController::class,'loginView'])->name('login');
Route::get('/register',[UserController::class,'registerView'])->name('register');
Route::post('/user/login',[UserController::class,'login']);
Route::post('/user/register',[UserController::class,'register']);
Route::post('/user/logout', [UserController::class,'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('admin');
    Route::prefix('/admin/theloai/')->group(function () {
        Route::prefix('add')->group(function () {
            Route::get('/',[TheLoaiController::class,'create']);
            Route::post('/store',[TheLoaiController::class,'store']);
        });
        Route::get('/',[TheLoaiController::class,'index']);
        Route::get('/edit/{theloai}',[TheLoaiController::class,'edit']);
        Route::post('/edit/{id}',[TheLoaiController::class,'handleEdit']);
        Route::DELETE('/delete',[TheLoaiController::class,'delete']);
    });
    Route::prefix('/admin/tintuc/')->group(function () {
        Route::prefix('add')->group(function () {
            Route::get('/',[TinTucController::class,'create']);
            Route::post('/store',[TinTucController::class,'store']);
        });
        Route::get('/',[TinTucController::class,'index']);
        Route::get('/edit/{tintuc}',[TinTucController::class,'edit']);
        Route::post('/edit/{id}',[TinTucController::class,'handleEdit']);
        Route::DELETE('/delete',[TinTucController::class,'delete']);
    });
});