<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\Auth\ProfileController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\ApartmentController;
use App\Http\Controllers\Dashboard\Admin\OrderController;
use App\Http\Controllers\Dashboard\Admin\CategoryController;
use App\Http\Controllers\Dashboard\Admin\OwnerController;
use App\Http\Controllers\Dashboard\Admin\CityController;
use App\Http\Controllers\Dashboard\Admin\RegionController;
use App\Http\Controllers\Dashboard\Admin\SettingController;
use App\Http\Controllers\Dashboard\Admin\WelcomeController;


Route::get('/dashboard/login', [AuthController::class,'index'])->name('dashboard.login.index');
Route::post('/dashboard/login', [AuthController::class,'store'])->name('dashboard.login.store');
Route::post('/dashboard/logout', [AuthController::class,'logout'])->name('dashboard.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware(['auth:admin'])->group(function () {

    Route::get('/', [WelcomeController::class,'index'])->name('welcome');

    // profile route
    Route::get('profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('profile/update/{user}', [ProfileController::class,'update'])->name('profile.update');

    //admins routes
    Route::resource('admins', AdminController::class)->except(['show']);

    //admins routes
    Route::resource('categorys', CategoryController::class)->except(['show']);

    //users routes
    Route::resource('users', UserController::class)->except(['show']);

    //owners routes
    Route::resource('owners', OwnerController::class)->except(['show']);

    //apartments routes
    Route::put('status/{apartment}', [ApartmentController::class,'status'])->name('apartments.status');
    Route::resource('apartments', ApartmentController::class);

    //orders routes
    Route::resource('orders', OrderController::class);

    //citys routes
    Route::resource('citys', CityController::class)->except(['show']);

    Route::resource('regions', RegionController::class)->except(['show']);

    Route::get('/settings/social_links', [SettingController::class, 'social_links'])->name('settings.social_links');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');


}); //end of dashboard routes

