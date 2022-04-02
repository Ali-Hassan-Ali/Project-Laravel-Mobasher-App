<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\apartment;

class SearchController extends Controller
{
    public function search($search)
    {   
        $apartments = apartment::where('city' , 'like', "%$search%")->get();

        return response()->api($apartments);

    }//end of search

    public function advanced_search($search)
    {
        $apartments = apartment::WhenSearch($search)->get();

        return response()->api($apartments);

    }//end of search

}//end of controller
