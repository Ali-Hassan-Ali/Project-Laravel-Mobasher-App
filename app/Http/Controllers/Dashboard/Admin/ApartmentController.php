<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ApartmentRequest;
use App\Models\City;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\Owner;
use App\Models\Media;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:apartments_read'])->only('index');
        $this->middleware(['permission:apartments_create'])->only('create','store');
        $this->middleware(['permission:apartments_update'])->only('edit','update');
        $this->middleware(['permission:apartments_delete'])->only('destroy');

    } //end of constructor

    public function index()
    {
        $apartments = Apartment::WhenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard_admin.apartments.index', compact('apartments'));

    }//end of index


    public function create()
    {
        $regions   = City::where('parent_id', '>', '1')->get();
        $citys     = City::where('parent_id', '0')->get();
        $categorys = Category::all();
        $owners    = Owner::all();

        return view('dashboard_admin.apartments.create', compact('citys', 'categorys', 'regions', 'citys', 'owners'));

    }//end of create


    public function store(ApartmentRequest $request)
    {

        $validated = $request->safe()->except(['video', 'national_card']);
        if ($request->video) {
            $validated['video'] = $request->file('video')->store('video_file', 'public');
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

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.admin.apartments.index');

    }//end of store


    public function show(Apartment $apartment)
    {
        $regions   = City::where('parent_id', '>', '0')->get();
        $citys     = City::all();
        $categorys = Category::all();
        $owners    = Owner::all();

        return view('dashboard_admin.apartments.show', compact('apartment', 'regions', 'citys', 'categorys', 'owners'));

    }//end of show

    
    public function edit(Apartment $apartment)
    {
        $regions   = City::where('parent_id', '>', '0')->get();
        $citys     = City::all();
        $categorys = Category::all();
        $owners    = Owner::all();

        return view('dashboard_admin.apartments.edit', compact('apartment', 'regions', 'citys', 'categorys', 'owners'));

    }//end of edit 


    public function update(ApartmentRequest $request, Apartment $apartment)
    {
        $validated = $request->validated();
        $validated = $request->safe()->except(['video', 'national_card']);

        if ($request->video) {
            Storage::disk('public')->delete($apartment->video);
            $validated['video'] = $request->file('video')->store('video_file', 'public');
        }

        if ($request->national_card) {
            Storage::disk('public')->delete($apartment->national_card);
            $validated['national_card'] = $request->file('national_card')->store('national_card_file', 'public');
        }
            
        $apartment->update($validated);

        if ($request->images) {
            
            foreach ($request->file('images') as $index=>$file) {

                Media::create([
                    'image'        => $file->store('apartment_image', 'public'),
                    'name'         => $file->getClientOriginalName(),
                    'index'        => $index,
                    'apartment_id' => $apartment->id,
                ]);

            }//end of rach

        }//end of if

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.admin.apartments.index');

    }//end of update


    public function destroy(Apartment $apartment)
    {
        

            // if ($apartment->image != 'apartment_images/default.png') {

            //     Storage::disk('local')->delete('public/'. $admin->image);

            // } //end of inner if

            $apartment->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.apartments.index');

        
    }//endof destroy

    public function status(Apartment $apartment)
    {

        $apartment->update(['status' => $apartment->status == false ? true : false]);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.admin.apartments.index');

    }//end of apartments status

}//end of controller