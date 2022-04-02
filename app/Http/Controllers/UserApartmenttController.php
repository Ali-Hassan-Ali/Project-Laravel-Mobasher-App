<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class UserApartmenttController extends Controller
{
    //

    public function fecthApartment(Request $request)
        {
        //composer dump-autoload
            $apartment =Apartment::with('images')->where('avilibalty', 1)->latest()->get();

            $total=$apartment->count();
            $page =$request->input('page',1);
        \Cache::set('Apartment',$apartment ,30*60);//30min
         return response(
            [
                  'message' =>"ok",
                  'error'=>false,
                'data'=>$apartment->forPage($page,20)->values(),
                'meta' => [
                'total' =>$total,
                'page'=>$page,
                'last_page' => ceil($total/20)
                ]
            ],202);


    }
}
