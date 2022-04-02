<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\DashboardController;

Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', function (){
        return redirect()->route('admin.auth.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', [LoginController::class,'login'])->name('login');
        Route::post('login', [LoginController::class,'submit']);
        // Route::get('logout', 'LoginController@logout')->name('logout');
    });

});


