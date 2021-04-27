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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::middleware('assign.guard:admin,admin/login')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.home');
        } )->name('admin.dashboard');
    });
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.show.login');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login');
});

Route::prefix('moderator')->group(function () {
    Route::middleware('assign.guard:moderator,moderator/login')->group(function () {
        Route::get('/dashboard', function () {
            return view('moderator.home');
        } )->name('moderator.dashboard');
    });
    Route::get('/login', [\App\Http\Controllers\Auth\ModeratorLoginController::class, 'showLoginForm'])->name('moderator.show.login');
    Route::post('/login', [\App\Http\Controllers\Auth\ModeratorLoginController::class, 'login'])->name('moderator.login');
});
