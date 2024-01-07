<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Trainee;

class HrWorkController extends Controller
{
    public function employee()
    {
        $employees = Employee::paginate(5);
        return view('hr.employee', compact('employees'));
    }

    public function trainee()
    {
        $trainees = Trainee::paginate(5);
        return view('hr.trainee', compact('trainees'));
    }
}
