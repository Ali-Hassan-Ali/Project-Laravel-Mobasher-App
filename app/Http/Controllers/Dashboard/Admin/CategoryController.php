<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:categorys_read'])->only('index');
        $this->middleware(['permission:categorys_create'])->only('create','store');
        $this->middleware(['permission:categorys_update'])->only('edit','update');
        $this->middleware(['permission:categorys_delete'])->only('destroy');

    } //end of constructor

    public function index()
    {
        $categorys = Category::WhenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard_admin.categorys.index', compact('categorys'));

    }//end of index 


    public function create()
    {
        return view('dashboard_admin.categorys.create');

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required','unique:categories','max:255'],
            'image' => ['required','image'],
        ]);

        try {

            $request_data          = $request->except('image');
            $request_data['image'] = $request->file('image')->store('categorys_images', 'public');

            Category::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store



    public function edit(Category $category)
    {
        return view('dashboard_admin.categorys.edit', compact('category'));

    }//end of edit


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', Rule::unique('categories')->ignore($category->id), 'max:255'],
        ]);

        try {

            $request_data = $request->except('image');

            if($request->image) {

                Storage::disk('local')->delete('public/'. $category->image);

                $request_data['image'] = $request->file('image')->store('categorys_images', 'public');

            }//end of if image

            
            $category->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

   
    public function destroy(Category $category)
    {
        try {

            Storage::disk('local')->delete('public/'. $category->image);

            $category->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
