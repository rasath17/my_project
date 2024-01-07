<?php

namespace App\Http\Controllers;

use App\Models\Hr;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Models\Task;

class EmployeeWorkController extends Controller
{
    public function daily($id)
    {
        $task = Task::where('employee_id', $id)->paginate(5);
        $trainee = Trainee::all();
        $hr = Hr::all();


        return view('employee.daily_task', [
            'tasks' => $task,
            'trainees' => $trainee,
            'hrs' => $hr
        ]);
    }

    public function accept(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->employee_status = 1;
        $task->trainee_status = 1;
        $task->save();
        $user = $request['user_id'];

        return redirect()->route('employee.daily.task', $user);
    }

    public function destroy(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->employee_status = 2;
        $task->save();
        $user = $request['user_id'];

        return redirect()->route('employee.daily.task', $user);
    }

    public function status(string $id)
    {
        $task = Task::where('employee_id', $id)->paginate(5);
        $trainee = Trainee::all();

        return view('employee.trainee_status', [
            'tasks' => $task,
            'trainees' => $trainee,
        ]);

    }
}
