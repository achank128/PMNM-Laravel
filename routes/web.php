<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoMonController;
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
    Route::prefix('/admin/bomon/')->group(function () {
        Route::prefix('add')->group(function () {
            Route::get('/',[BoMonController::class,'create']);
            Route::post('/store',[BoMonController::class,'store']);
        });
        Route::get('/',[BoMonController::class,'index']);
        Route::get('/edit/{bomon}',[BoMonController::class,'edit']);
        Route::post('/edit/{id}',[BoMonController::class,'handleEdit']);
        Route::DELETE('/delete',[BoMonController::class,'delete']);
    });
   
});