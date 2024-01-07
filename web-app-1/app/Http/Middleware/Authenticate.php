<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        $path = $request->path();
        $prefixEmployee = substr($path, 0, 8);
        $prefixTrainee = substr($path, 0, 7);
        $prefixHr = substr($path, 0, 2);

        if ($prefixEmployee === "employee") {
            return $request->expectsJson() ? null : route('employee.login');
        }


        if ($prefixTrainee === "trainee") {
            return $request->expectsJson() ? null : route('trainee.login');
        }


        if ($prefixHr === "hr") {
            return $request->expectsJson() ? null : route('hr.login');
        }


        return $request->expectsJson() ? null : url('/');
    }
}




/*

 if (Auth::guard($request) === Auth::guard('employee')) {
     return $request->expectsJson() ? null : route('employee.login');
 }


 if (Auth::guard($request) === Auth::guard('trainee')) {
     return $request->expectsJson() ? null : route('trainee.login');
 }



 if (Auth::guard($request) === Auth::guard('hr')) {
     return $request->expectsJson() ? null : route('hr.login');
 }



 if (!Auth::guard('hr')) {
     return "hello";
 }
*/
