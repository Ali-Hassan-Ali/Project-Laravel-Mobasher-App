<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\admin;
class LoginController extends Controller
{

    protected $guard = 'admin';

    public function __construct()
    {
        // $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function login()
    {
        return view('Admin.Auth.Login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (!\Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.auth.login');
    }
}
