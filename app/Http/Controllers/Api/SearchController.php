<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        $city = $request->input('city');

        $apartments = Apartment::where('city' , 'like', "%$city%")->limit(5)->get();

        return response()->api($apartments);

    }//end of search

    public function advanced_search(Request $request)
    {
        $apartments = Apartment::where('city', 'like', '%' . $request->input('city') . '%')
                                 ->orWhere('state', 'like', '%' . $request->input('state') . '%')
                                 ->orWhere('price', 'like', '%' . $request->input('price') . '%')
                                 ->orWhere('rooms', 'like', '%' . $request->input('rooms') . '%')
                                 ->orWhere('region', 'like', '%' . $request->input('region') . '%')
                                 ->latest()->get();

        return response()->api($apartments);

    }//end of search

}//end of controller
