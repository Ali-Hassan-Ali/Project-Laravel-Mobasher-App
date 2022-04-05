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
        $validator = Validator::make($request->all(), [
            'user_id'      => ['required'],
            'apartment_id' => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->api([], 1, $validator->errors()->first());

        }//end of if

        if (Order::where('apartment_id', $request->apartment_id)->first()) {

            return response()->api([], 1, 'I_did_the_same_process');

        }//end of if

        $order = Order::create([
            'user_id'      => $request->user_id,
            'apartment_id' => $request->apartment_id,
        ]);

        $order = Order::with('user','apartment')->find($order->id);

        return response()->api($order);

    }//end of store

}//end of model 
