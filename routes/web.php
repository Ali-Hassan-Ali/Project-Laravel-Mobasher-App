<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Owner\WelcomController;


Route::get('/', function (){
    
    if (!auth()->guard('admin')->check()) {
            
        return view('dashboard_admin.auth.login');

    }//end of if

    return redirect()->route('dashboard.admin.welcome');

});

Route::get('form-owner', [WelcomController::class, 'index'])->name('owner.apartments.index');

Route::post('form-owner-store', [WelcomController::class, 'store'])->name('owner.apartments.store');

Route::get('form-owner-done', [WelcomController::class, 'done'])->name('owner.apartments.done');