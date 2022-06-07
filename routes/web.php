<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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



Route::group(['middleware' => 'web'],function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});
Route::group(['middleware' => ['auth'], 'namespace' => 'index'],function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
});

require __DIR__ . '/teacher.php';
require __DIR__ . '/student.php';
require __DIR__ . '/mark_sheet.php';
