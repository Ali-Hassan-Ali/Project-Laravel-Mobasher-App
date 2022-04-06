<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorey;
use App\Models\Owner;

class WelcomController extends Controller
{

    public function __construct()
    {
        //read 
        $this->middleware(['permission:dashboard_read'])->only('index');

    }//end of constructor
    
    public function index()
    {
        return view('dashboard_admin.welcome');

    }//end of index

}//end of controller