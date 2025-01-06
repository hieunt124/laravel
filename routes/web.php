<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use \App\Http\Controllers\DashboardController;
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
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'handleLogin'])->name('login.submit');
});
Route::group(['prefix' => 'auth', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/action', [UserController::class, 'bulkAction'])->name('users.action');
        Route::get('/update', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/delete', [UserController::class, 'update'])->name('users.update');
    });
});
//Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');


