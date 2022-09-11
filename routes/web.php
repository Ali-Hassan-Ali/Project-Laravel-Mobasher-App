<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;

// https://codepen.io/DashboardPack/pen/REmEZQ


Route::get('/', function (){
    
    if (!auth()->guard('admin')->check()) {
            
        return view('dashboard_admin.auth.login');

    }//end of if

    return redirect()->route('dashboard.admin.welcome');

});