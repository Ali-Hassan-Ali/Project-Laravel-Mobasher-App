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
            'title'      => ['required'],
            'type'       => ['required'],
            'city'       => ['required'],
            'state'      => ['required'],
            'dimensions' => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if

        $apartment = Apartment::create($request->all());

        return response()->api($apartment);

    }//end of fun

}//end of controller
