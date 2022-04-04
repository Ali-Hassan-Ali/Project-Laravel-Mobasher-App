<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        $admins = Admin::WhenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard_admin.admins.index', compact('admins'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_admin.admins.create');

    }//end of create

    
    public function store(Request $request)
    {
         $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required','unique:admins'],
            'image'       => ['required','image'],
            'phone'       => ['required','max:11','min:8'],
            'password'    => ['required','confirmed'],
        ]);

        // try {

            $request_data             = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                $request_data['image'] = $request->file('image')->store('admin_images','public');

            } //end of if
            
            $admin = Admin::create($request_data);
            
            $admin->attachRole('admin');
            $admin->syncPermissions($request->permissions);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.admins.index');

        // } catch (\Exception $e) {

            // return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        // }//end try

    }//end of store


    public function edit(Admin $admin)
    {
        return view('dashboard_admin.admins.index', compact('admin'));

    }//end of edit

   
    public function update(Request $request, Admin $admin)
    {
         $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('admins')->ignore($admin->id)],
            'phone'       => ['required','max:11','min:8'],
        ]);

        try {
            
            $request_data = $request->except(['permissions', 'image','password','password_confirmation']);

            if ($request->image) {

                if ($admin->image != 'admin_images/default.png') {

                    Storage::disk('local')->delete('public/'. $admin->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('user_images','public');

            } //end of external if

            $admin->update($request_data);

            $admin->syncPermissions($request->permissions);
            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.admins.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        try {

            if ($admin->image != 'admin_images/default.png') {

                Storage::disk('local')->delete('public/'. $admin->image);

            } //end of inner if

            $admin->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.admins.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller
