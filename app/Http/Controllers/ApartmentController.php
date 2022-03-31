<?php

namespace App\Http\Controllers;

use App\Models\apartment;
use App\Models\media;
use App\Models\User;
use App\Models\Rent;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\Addapatrment;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function getRents(){
        return Rent::with('User','apartment')->get();
    }


    public function index()
    {

        $data =apartment::with('images')->get();
        return view ('aparments.view_apartment')->withData ( $data );
    }

    public function getApartments(Request $request)
    {
        if ($request->ajax()) {
            // $data = apartment::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
    }


     public function Add(){
         return view('aparments.addapartment');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Addapatrment $request)
    {
//    dd($request->imageFile);

      $apartment =  apartment::create($request->only( 'Titel','type','floor','city','state','dimensions','small_room',
        'medium_room','large_room','extra_large_room','street',
        'Description','price','lat','lng','class'));


    foreach ($request->file('imageFile') as $imagefile) {
      $image = new media;
    //   $path = $file->move(public_path().'/uploads/', $name);
      $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
     $imageName = time().'.'.$imagefile->extension();
      $image->name = $imageName;
      $image->image_path = $path;
      $image->apartment_id = $apartment->id;
      $image->save();
    }



    return back()->with('success', 'تم اضافة البيانات الجديده بنجاح');

    }




    public function addapartment(){
        return view('apartment.addapartment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(apartment $apartment)
    {
        return apartment::findOrFail('id', $apartment->id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */

    public function Edit( $id){
        $apartment = apartment::findOrFail($id);
        return view('aparments.EditApartment')->with('data',$apartment);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        // $apartment = apartment::where('id', $request->id)->update($request->all());
        $apartment=apartment::find($id)->update($request->all());

        return redirect ('apartments')->with('message','بنجاح' .$request->id.'تم تعديل بيانات الشقه' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        // $application->delete();
        $trash = apartment::find($id)->delete();

        return redirect()->route('apartments')->with('error','Data Deleted');
        // User::withTrashed()->count();
        // User::withTrashed()->where('id', 1)->restore();
        // User::first()->forceDelete();
        // User::first()->forceDelete();
    }

//     return redirect()->route('your route name')->with('message','Data added Successfully');

// return redirect()->route('your route name')->with('error','Data Deleted');

// return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');

// return redirect()->route('your route name')->with('info','This is xyz information');
}
