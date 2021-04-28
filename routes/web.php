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
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/home', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
});
Route::prefix('moderator')->group(function () {
    Route::get('/', [\App\Http\Controllers\ModeratorController::class, 'index'])->name('moderator');
    Route::get('/home', [\App\Http\Controllers\ModeratorController::class, 'index'])->name('moderator.home');
});

