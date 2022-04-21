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
            'city'       => ['required'],
            'state'      => ['required'],
            'type'       => ['required'],
            'floor'      => ['required'],
            'price'      => ['required'],
            'rooms'      => ['required'],
            'dimensions' => ['required'],
            'description'=> ['required'],
            'user_id'    => ['required'],
            'image'      => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->api([], true, $validator->errors()->first());

        }//end of if

        $apartment = Apartment::create($request->only('city',
                                                      'state',
                                                      'type',
                                                      'floor',
                                                      'price',
                                                      'rooms',
                                                      'dimensions',
                                                      'description',
                                                      'user_id'));
        $apartment->update([
            'image' => $request->file('image')->store('apartment_images', 'public'),
        ]);
            
        $apartment = Apartment::findOrFail($apartment->id);

        return response()->api($apartment);

    }//end of fun

}//end of controller

// city state price rooms region