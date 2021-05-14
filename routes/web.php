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

Auth::routes(['verify'=>true]);

/*Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');*/


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



Route::group([
    "prefix" => "admin"
],function() {
    Route::get("login", [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name("admin.show_login");
    Route::post("login", [\App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name("admin.do_login");
    Route::post("logout", [\App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name("admin.logout");

    //Reset Password
    Route::get('password/reset', [\App\Http\Controllers\Auth\ForgotPasswordAdminController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordAdminController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}/{email}', [\App\Http\Controllers\Auth\ResetPasswordAdminController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordAdminController::class, 'reset'])->name('admin.password.update');

});

Route::prefix('admin')
    ->middleware(['assign.guard:admin,admin/login'])
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

        Route::get('/just-for-admins', function () {
            return 'Just For Admins';
        })->name('admin.home')->middleware('role:administrator');

        Route::get('/just-for-moderators', function () {
            return 'Just For Moderators';
        })->name('moderator.home')->middleware('role:administrator|moderator');
    });

