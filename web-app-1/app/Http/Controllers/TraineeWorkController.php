<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TraineeWorkController extends Controller
{
    public function task($id)
    {
        $tasks = Task::where(['trainee_id' => $id, 'employee_status' => 1])->paginate(5);
        return view('trainee.task', compact('tasks'));
    }

    public function complete(Request $request, string $id)
    {

        $task = Task::find($id);
        $task->trainee_status = 2;
        $task->save();
        $user = $request['user_id'];

        return redirect()->route('trainee.task', $user);
    }
}
