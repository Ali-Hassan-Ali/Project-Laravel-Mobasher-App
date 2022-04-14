<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('user_id','apartment_id'), [
            'user_id'      => ['required','numeric'],
            'apartment_id' => ['required','numeric'],
        ]);

        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if

        if (Order::where('apartment_id', $request->input("apartment_id"))->first()) {

            return response()->api([], 1, 'I_did_the_same_process');

        }//end of if

        $order = Order::create($request->only('user_id','apartment_id'));

        $order = Order::with('user','apartment')->find($order->id);

        return response()->api($order);

    }//end of store

}//end of model 
