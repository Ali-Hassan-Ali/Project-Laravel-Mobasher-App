<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\OederResources;
use App\Models\Order;
use App\Rules\PhoneNumber;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'      => ['required','numeric'],
            'apartment_id' => ['required','numeric', 'unique:orders'],
            'full_name'    => ['required','string','min:2','max:50'],
            'phone1'       => ['required','numeric'],
            'phone2'       => ['required','numeric'],
            'age'          => ['required','numeric'],
            'gender'       => ['nullable','min:2','max:50'],
            'identity'     => ['required','numeric'],
            'social_situation' => ['required','string','min:1','max:50'],
            'works'        => ['required','string','min:1','max:50'],
            'full_region'  => ['required','string','min:1','max:50'],
            'city'         => ['required','string','min:1','max:50'],
            'region'       => ['required','string','min:1','max:50'],
            'type_of_rent' => ['required','string','min:1','max:50'],
            'incom'        => ['required','string','min:1','max:50'],
            'agreeya'      => ['required','string','min:1','max:50'],
        ]);


        if ($validator->fails()) {

            return response()->api([], true, $validator->errors()->all(), 422);

        }//end of if

        $newOrder = Order::create($validator->validated());

        $order = Order::with('apartment.images')->find($newOrder->id);

        return response()->api($order);

    }//end of store

    public function show($order)
    {
        $data = Order::with('apartment')->find($order);

        if ($data) {
            
            return response()->api(new OederResources($data));

        } else {

            return response()->api([], true, 'not found', 404);

        }//end of checl find order


    }//end of store

}//end of model 
