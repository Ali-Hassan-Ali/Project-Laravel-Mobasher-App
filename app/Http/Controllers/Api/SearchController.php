<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        $apartments = Apartment::where('city' , 'like', "%$request->search%")->limit(5)->get();

        return response()->api($apartments);

    }//end of search

    public function advanced_search(Request $request)
    {

        $apartments = Apartment::where('city' , 'like', "%$request->city%")->limit(5)->get();
        $apartments = Apartment::where('id' , 'like', "%$request->id%")->limit(5)->get();

        return response()->api($apartments);

        $apartments = Apartment::when($request->all(), function($q) use ($request){

            return $q->where('title', 'like', "%$request->title%")
                ->orWhere('city', 'like', '%', "%$request->city%")
                ->orWhere('id', 'like', '%', "%$request->id%");

        })->latest()->limit(2)->get();

        return response()->api($apartments);

    }//end of search

}//end of controller
