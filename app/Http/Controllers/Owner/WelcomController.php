<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Apartment;
use App\Models\Media;
use App\Models\City;
use App\Models\Owner;

class WelcomController extends Controller
{
    
    public function index()
    {
    	$regions   = City::where('parent_id', '>', '1')->get();
        $citys     = City::where('parent_id', '0')->get();
        $categorys = Category::all();
        $owners    = Owner::all();

        return view('owners.forms.create', compact('citys', 'categorys', 'regions', 'citys', 'owners'));

    }//end of index

    public function store(ApartmentRequest $request)
    {

    	$validated = $request->safe()->except(['video', 'ownership', 'national_card']);
        if ($request->video) {
            $validated['video'] = $request->file('video')->store('video_file', 'public');
        }

        if ($request->ownership) {
            $validated['ownership'] = $request->file('ownership')->store('ownership_file', 'public');
        }

        if ($request->national_card) {
            $validated['national_card'] = $request->file('national_card')->store('national_card_file', 'public');
        }
            
        $apartment = Apartment::create($validated);

        foreach ($request->file('images') as $index => $file) {
            
            Media::create([
                'image'        => $file->store('apartment_image', 'public'),
                'name'         => $file->getClientOriginalName(),
                'index'        => $index,
                'apartment_id' => $apartment->id,
            ]);

        }//end of rach
        
        return redirect()->route('owner.apartments.done');

    }//end of store

    public function done()
    {
    	return view('owners.forms.done');

    }//end of done

}//end of controller