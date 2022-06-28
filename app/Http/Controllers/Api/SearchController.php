<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class SearchController extends Controller
{
    // public function search(Request $request)
    // {   
    //     $city = $request->input('city');

    //     $apartments = Apartment::where('city' , 'like', "%$city%")->limit(5)->get();

    //     return response()->api($apartments);

    // }//end of search

    public function search($search)
    {
        $apartments = Apartment::where('title', 'like', "%$search%")
                                 ->orWhere('location_floor', 'like', "%$search%")
                                 ->orWhere('description', 'like', "%$search%")
                                 ->orWhere('number_rooms', 'like', "%$search%")
                                 ->orWhere('price', 'like', "%$search%")
                                 ->latest()->get();

        return response()->api($apartments);

    }//end of search

}//end of controller
