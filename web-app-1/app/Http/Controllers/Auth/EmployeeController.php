<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    public function register()
    {
        return view('employee.register');
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Employee::class],
            'password' => ['required', 'confirmed', 'min:8'],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:' . Employee::class]
        ]);


        $user = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employee.login');
    }


    public function login()
    {
        return view('employee.login');
    }


    public function check(Request $request)
    {

        $check = $request->all();

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);


        if (Auth::guard('employee')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('employee.dashboard');
        } else {
            return back()->withErrors(['error'=>'E-mail or password not matched']);
        }
    }


    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }

    public function dashboard()
    {
        return view('employee.dashboard');
    }

}
