<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\OederResources;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('user_id','apartment_id'), [
            'user_id'      => ['required','numeric'],
            'apartment_id' => ['required','numeric', 'unique:orders'],
        ]);

        if ($validator->fails()) {

            return response()->api([], true, $validator->errors()->first(), 422);

        }//end of if

        $newOrder = Order::create($request->only('user_id','apartment_id'));

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
