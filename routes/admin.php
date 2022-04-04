<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\WelcomController;


Route::get('/dashboard/login', [AuthController::class,'index'])->name('dashboard.login.index');
Route::post('/dashboard/login', [AuthController::class,'store'])->name('dashboard.login.store');
Route::post('/dashboard/logout', [AuthController::class,'seller_logout'])->name('dashboard.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware(['auth:admin'])->group(function () {

    Route::get('/', [WelcomController::class,'index'])->name('welcome');

    // profile route
    Route::get('profile/edit', [LoginController::class,'edit'])->name('profile.edit');
    Route::put('profile/update/{user}', [LoginController::class,'update'])->name('profile.update');

    //user routes
    Route::resource('admins', AdminController::class)->except(['show']);

    //user routes
    Route::resource('orders', AdminController::class)->except(['show']);


}); //end of dashboard routes

