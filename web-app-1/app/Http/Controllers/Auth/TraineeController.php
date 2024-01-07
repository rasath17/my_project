<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Trainee;
use Illuminate\Support\Facades\Validator;

class TraineeController extends Controller
{

    public function register()
    {
        return view('trainee.register');
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Trainee::class],
            'password' => ['required', 'confirmed', 'min:8'],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:' . Trainee::class]
        ]);


        $user = Trainee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('trainee.login');
    }


    public function login()
    {
        return view('trainee.login');
    }


    public function check(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        $check = $request->all();

        if (Auth::guard('trainee')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('trainee.dashboard');
        } else {
            return back()->withErrors(['error' => 'E-mail or password is not match']);
        }
    }


    public function logout()
    {
        Auth::guard('trainee')->logout();
        return redirect()->route('trainee.login');
    }

    public function dashboard()
    {
        return view('trainee.dashboard');
    }

}
