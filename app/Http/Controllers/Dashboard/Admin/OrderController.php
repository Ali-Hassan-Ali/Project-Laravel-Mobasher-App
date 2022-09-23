<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Apartment;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:orders_read'])->only('index');
        $this->middleware(['permission:orders_create'])->only('create','store');
        $this->middleware(['permission:orders_update'])->only('edit','update');
        $this->middleware(['permission:orders_delete'])->only('destroy');

    } //end of constructor

    public function index()
    {

        $orders = Order::WhenSearch(request()->search)
                        ->with('user','apartment')
                        ->latest()
                        ->paginate(10);

        return view('dashboard_admin.orders.index', compact('orders'));

    }//end of index 

    
    public function create()
    {
        $apartmentId    = Order::pluck('apartment_id');
        $apartments     = Apartment::whereNotIn('id', $apartmentId)->get();
        $users          = User::all();

        return view('dashboard_admin.orders.create', compact('users','apartments'));

    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => ['required','numeric'],
            'user_id'      => ['required','numeric'],
            'status'       => ['required'],
        ]);

        try {

            $request->all();
            $request['total_price'] = Apartment::find($request->apartment_id)->price;
            Order::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.orders.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store


    public function show(Order $order)
    {
        return view('dashboard_admin.orders.show', compact('order'));
        
    }//end if show


    public function edit(Order $order)
    {
        $apartmentId    = Order::pluck('apartment_id');
        $apartments     = Apartment::whereNotIn('id', $apartmentId)->get();
        $users          = User::all();

        return view('dashboard_admin.orders.edit', compact('order','apartments','users'));

    }//end of edit 


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'apartment_id' => ['required','numeric'],
            'user_id'      => ['required','numeric'],
            'status'       => ['required'],
        ]);

        try {

            $request->all();
            $request['total_price'] = Apartment::find($request->apartment_id)->price;

            $order->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.orders.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of edit

    
    public function destroy(Order $order)
    {
        try {

            $order->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.orders.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller