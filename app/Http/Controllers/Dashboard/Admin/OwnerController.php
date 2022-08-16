<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Owner;
use App\Http\Requests\OwnerRequest;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:owners_read'])->only('index');
        $this->middleware(['permission:owners_create'])->only('create','store');
        $this->middleware(['permission:owners_update'])->only('edit','update');
        $this->middleware(['permission:owners_delete'])->only('destroy');

    }// end of __construct
    
    public function index()
    {
        $owners = Owner::WhenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard_admin.owners.index', compact('owners'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_admin.owners.create');

    }//end of create

    
    public function store(OwnerRequest $request)
    {
        $validated          = $request->validated();
        $validated          = $request->safe()->except(['image']);
        $validated['user_id'] = auth()->id();
        $validated['image']   = $request->file('image')->store('owner_images', 'public');

        Owner::create($validated);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.admin.owners.index');

    }//end of store

    public function edit(Owner $owner)
    {
        return view('dashboard_admin.owners.edit', compact('owner'));

    }//end of edit

    
    public function update(OwnerRequest $request, Owner $owner)
    {
        $validated          = $request->validated();
        $validated          = $request->safe()->except(['image']);
        
        $validated['user_id'] = auth()->id();

        if ($request->image) {
            $validated['image']   = $request->file('image')->store('owner_images', 'public');
        }

        $owner->update($validated);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.admin.owners.index');

    }//end of update


    public function destroy(Owner $owner)
    {
        Storage::disk('public')->delete($owner->image);

        $owner->delete();

        session()->flash('success', __('dashboard.deleted_successfully'));
        return redirect()->route('dashboard.admin.owners.index');

    }//end of destroy

}//end of controller
