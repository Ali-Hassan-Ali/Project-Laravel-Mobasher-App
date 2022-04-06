<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\City;
use App\Models\Apartment;
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
        $citys = City::all();

        return view('dashboard_admin.apartments.create', compact('citys'));

    }//end of create


    public function store(Request $request)
    {
         $request->validate([
            'name'  => ['required','max:255'],
            'image' => ['required','image'],
            'city'  => ['required','max:255'],
            'state' => ['required','max:255'],
            'dimensions'  => ['required'],
            'description' => ['required'],
            'lat' => ['required','numeric'],
            'lng' => ['required','numeric'],
            'price' => ['required','numeric'],
            'avilibalty'   => ['required'],
            'available_at' => ['required'],
            'class'        => ['required'],
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('apartment_images','public');

            } //end of if
            
            Apartment::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.apartments.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function show(Apartment $apartment)
    {
        return view('dashboard_admin.apartments.show', compact('apartment'));

    }//end of show

    
    public function edit(Apartment $apartment)
    {
        return view('dashboard_admin.apartments.edit', compact('apartment'));

    }//end of edit 


    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'title' => ['required','max:255'],
            'image' => ['required','image'],
            'city'  => ['required','max:255'],
            'state' => ['required','max:255'],
            'dimensions'  => ['required'],
            'description' => ['required'],
            'lat' => ['required','numeric'],
            'lng' => ['required','numeric'],
            'price' => ['required','numeric'],
            'avilibalty'   => ['required'],
            'available_at' => ['required'],
            'class'        => ['required'],
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($apartment->image != 'apartment_images/default.png') {

                    Storage::disk('local')->delete('public/'. $apartment->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('apartment_images','public');

            } //end of if
            
            $apartment->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.apartments.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function destroy(Apartment $apartment)
    {
        try {

            if ($apartment->image != 'apartment_images/default.png') {

                Storage::disk('local')->delete('public/'. $admin->image);

            } //end of inner if

            $apartment->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.apartments.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//endof destroy

}//end of controller
