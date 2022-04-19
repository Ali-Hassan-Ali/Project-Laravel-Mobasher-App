<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'city'       => ['required'],
            // 'state'      => ['required'],
            // 'dimensions' => ['required'],
            // 'type'       => ['required'],
            // 'floor'      => ['required'],
            // 'street'     => ['required'],
            // 'title'      => ['required'],
            // 'description'=> ['required'],
            // 'price'      => ['required'],
        ]);
        // $request->fullUrl();
        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if

        $apartment = Apartment::create(response()->json($request->all()));
        // $apartment = Apartment::create($request->json()->all());
        
        $apartment = Apartment::findOrFail($apartment->id);

        return response()->api($apartment);

    }//end of fun

}//end of controller
