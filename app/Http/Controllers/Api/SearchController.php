<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApatrmentResources;
use Illuminate\Http\Request;
use App\Models\Apartment;

class SearchController extends Controller
{
    public function advanced_search(Request $request)
    {   
        $city = $request->input('city');

        $apartments = Apartment::where('city' , 'like', "%$city%")->limit(5)->get();

        return response()->api($apartments);

    }//end of search

    public function search($search = null)
    {
        if (!$search) {
            return response()->api(new ApatrmentResources([]));
        } 
        $apartments = Apartment::where('area_metres', 'like', "%$search%")
                                 ->orWhere('number_bathrooms', 'like', "%$search%")
                                 ->orWhere('price_range', 'like', "%$search%")
                                 ->orWhere('number_bathrooms', 'like', "%$search%")
                                 ->orWhere('area_metres', 'like', "%$search%")
                                 ->latest()->get();

        return response()->api(new ApatrmentResources($apartments ?? []));

    }//end of search

}//end of controller
