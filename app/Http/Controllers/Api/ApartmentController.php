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
        ]);
        // $request->fullUrl();
        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

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

        // $apartment = Apartment::create([$request->input('city')
        //                                 'city'  => ,
        //                                 'state' => $request->input('state'),
        //                                 'type'  => $request->input('type'),
        //                                 'floor' => $request->input('floor'),
        //                                 'price' => $request->input('price'),
        //                                 'rooms' => $request->input('rooms'),
        //                                 'dimensions'  => $request->input('dimensions'),
        //                                 'description' => $request->input('description'),
        //                                 'user_id'     => $request->input('user_id'),
        //                                ]);
        
        $apartment = Apartment::findOrFail($apartment->id);

        return response()->api($apartment);

    }//end of fun

}//end of controller
