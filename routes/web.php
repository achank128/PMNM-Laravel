<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TaiLieuController;
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
    return view('login', ['title'=>'Đăng nhập']);
});

Route::post('/loginsv',[UserController::class,'login']);

Route::get('/home',[HomeController::class,'index'])->name('admin');
Route::prefix('/admin/danhmuc/')->group(function () {
    Route::prefix('add')->group(function () {
        Route::get('/',[DanhMucController::class,'create']);
        Route::post('/store',[DanhMucController::class,'store']);
    });
    Route::get('/',[DanhMucController::class,'index']);
    Route::get('/edit/{danhmuc}',[DanhMucController::class,'edit']);
    Route::post('/edit/{id}',[DanhMucController::class,'handleEdit']);
    Route::DELETE('/delete',[DanhMucController::class,'delete']);
});
Route::prefix('/admin/tailieu/')->group(function () {
    Route::prefix('add')->group(function () {
        Route::get('/',[TaiLieuController::class,'create']);
        Route::post('/store',[TaiLieuController::class,'store']);
    });
    Route::get('/',[TaiLieuController::class,'index']);
    Route::get('/edit/{tailieu}',[TaiLieuController::class,'edit']);
    Route::post('/edit/{id}',[TaiLieuController::class,'handleEdit']);
    Route::DELETE('/delete',[TaiLieuController::class,'delete']);
});