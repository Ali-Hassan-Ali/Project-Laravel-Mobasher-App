<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        $apartments = Apartment::where('city' , 'like', "%$request->search%")->get();

        return response([
                'message' => "ok",
                'error'   => false,
                'data'    => $apartments,
                'meta' => [
                    'total'     => $apartments->count(),
                    'page'      => $apartments->count(),
                    'last_page' => ceil($apartments->count()/20)
                ]
            ],200);

        return response()->api($apartments);

    }//end of search

    public function advanced_search(Request $request)
    {
        $apartments = Apartment::WhenSearch($request->search)->get();

        return response([
                'message' => "ok",
                'error'   => false,
                'data'    => $apartments,
                'meta' => [
                    'total'     => $apartments->count(),
                    'page'      => $apartments->count(),
                    'last_page' => ceil($apartments->count()/20)
                ]
            ],200);

        return response()->api($apartments);

    }//end of search

}//end of controller
