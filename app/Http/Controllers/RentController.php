<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
class RentController extends Controller
{
    //

    public function index(Request $request){

        $rent =Rent::with('apartment')->where(\Auth::user())->all();
       return response(
            [
            'message' => 'Reservation complete',
            'error' => false,
            'rent' => $rent
            ],200);
    }


    public function Reservation(Request $request){


           $newRent = Rent::create($request->only('user_id','apartment_id'));
            return response(
            [
            'message' => 'تم الحجز',
            'error' => false,
  
            'newRent' => Rent::with('User','apartment')->where('id', $newRent->id)->first()
            ],202);

    }

    public function cancelReservation(Request $request){
        $rent = Rent::find($request->only('id'))->delete();


       return response(
            [
            'message' => 'Reservation canceled',
            'error' => false
            ],200);
    }



}

