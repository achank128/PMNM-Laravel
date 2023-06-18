<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
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
    Route::prefix('/admin/lop/')->group(function () {
        Route::get('/',[ClassController::class,'filter']);
        Route::prefix('add')->group(function () {
            Route::get('/',[ClassController::class,'createView']);
            Route::post('/store',[ClassController::class,'store']);
        });
        Route::get('/edit/{lop}',[ClassController::class,'editView']);
        Route::post('/update/{id}',[ClassController::class,'update']);
        Route::DELETE('/delete',[ClassController::class,'delete']);
    });
    Route::prefix('/admin/sinhvien/')->group(function () {
        Route::get('/',[StudentController::class,'filter']);
        Route::prefix('add')->group(function () {
            Route::get('/',[StudentController::class,'createView']);
            Route::post('/store',[StudentController::class,'store']);
        });
        Route::get('/edit/{sv}',[StudentController::class,'editView']);
        Route::post('/update/{id}',[StudentController::class,'update']);
        Route::delete('/delete',[StudentController::class,'delete']);
    });
});