<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\Auth\ProfileController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\ApartmentController;
use App\Http\Controllers\Dashboard\Admin\OrderController;
use App\Http\Controllers\Dashboard\Admin\CityController;
use App\Http\Controllers\Dashboard\Admin\WelcomController;


Route::get('/dashboard/login', [AuthController::class,'index'])->name('dashboard.login.index');
Route::post('/dashboard/login', [AuthController::class,'store'])->name('dashboard.login.store');
Route::post('/dashboard/logout', [AuthController::class,'logout'])->name('dashboard.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware(['auth:admin'])->group(function () {

    Route::get('/', [WelcomController::class,'index'])->name('welcome');

    // profile route
    Route::get('profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('profile/update/{user}', [ProfileController::class,'update'])->name('profile.update');

    //admins routes
    Route::resource('admins', AdminController::class)->except(['show']);

    //apartments routes
    Route::resource('apartments', ApartmentController::class)->except(['show']);

    //orders routes
    Route::resource('orders', OrderController::class);

    //citys routes
    Route::resource('citys', CityController::class)->except(['show']);


}); //end of dashboard routes

