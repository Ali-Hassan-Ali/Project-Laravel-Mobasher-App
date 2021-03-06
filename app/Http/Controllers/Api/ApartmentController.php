<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Category;

class ApartmentController extends Controller
{

    public function index()
    {
        $apartments['apartment'] = Apartment::with('images','properties')->where('status', 1)->get();
        $apartments['category']  = 'fdf';
        
        return response()->api($apartments);

    }//end of index


    public function show($id)
    {
        $category = Category::findOrFail($id);

        $apartments['apartmens'] = Apartment::where('category_id', $category->id)
                                               ->with('images','properties')
                                               ->where('status', 1)
                                               ->get();

        $apartments['category'] = $category->name;

        return response()->api($apartments);

    }//end of index

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