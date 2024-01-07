<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Hr;

class HrController extends Controller
{
    public function register()
    {
        return view('hr.register');
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Hr::class],
            'password' => ['required', 'confirmed', 'min:8'],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:' . Hr::class]
        ]);


        $user = Hr::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('hr.login');
    }


    public function login()
    {
        return view('hr.login');
    }


    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        $check = $request->all();

        if (Auth::guard('hr')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('hr.dashboard');
        } else {
            return back()->withErrors(['error' => 'E-mail or password is not match']);
        }

    }

    public function logout()
    {
        Auth::guard('hr')->logout();
        return redirect()->route('hr.login');
    }

    public function dashboard()
    {
        return view('hr.dashboard');
    }

}
