<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:regions_read'])->only('index');
        $this->middleware(['permission:regions_create'])->only('create','store');
        $this->middleware(['permission:regions_update'])->only('edit','update');
        $this->middleware(['permission:regions_delete'])->only('destroy');

    } //end of constructor

    public function index()
    {
        $regions = City::with('parent')->WhenSearch(request()->search)
                       ->whereNotNull('parent_id')
                       ->latest()->paginate(10);

        return view('dashboard_admin.regions.index', compact('regions'));

    }//end of index 


    public function create()
    {
        $citys = City::whereNull('parent_id')->get();

        return view('dashboard_admin.regions.create', compact('citys'));

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required','max:255'],
            'parent_id' => ['required','numeric'],
        ]);

        try {

            City::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.regions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store



    public function edit(City $region)
    {
        $citys = City::whereNull('parent_id')->get();

        return view('dashboard_admin.regions.edit', compact('region', 'citys'));

    }//end of edit


    public function update(Request $request, City $region)
    {
        $request->validate([
            'name'      => ['required','max:255'],
            'parent_id' => ['required','numeric'],
        ]);

        try {
            
            $region->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.regions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

   
    public function destroy(City $region)
    {
        try {

            $region->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.regions.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller