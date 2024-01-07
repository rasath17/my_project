<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Task;
use function Symfony\Component\Translation\t;
use App\Models\Employee;
use App\Models\Trainee;
use App\Models\Hr;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $task = Task::orderBy('id','desc')->paginate(5);
        $employee = Employee::all();
        $trainee = Trainee::all();
        $hr = Hr::all();
        return view('hr.task.status', [
            'tasks' => $task,
            'employees' => $employee,
            'trainees' => $trainee,
            'hrs' => $hr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hr.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'task' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'numeric'],
            'trainee_id' => ['required', 'numeric']
        ]);


        $user = Task::create([
            'hr_id' => $id,
            'employee_id' => $request['employee_id'],
            'trainee_id' => $request['trainee_id'],
            'task' => $request['task'],

        ]);

        return redirect()->route('hr.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('hr.task.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'numeric'],
            'trainee_id' => ['required', 'numeric']
        ]);

        $task1 = Task::find($id);

        $task1->employee_id = $request['employee_id'];
        $task1->trainee_id = $request['trainee_id'];
        $task1->task = $request['task'];

        $task1->save();


        return redirect()->route('task.status');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasks = Task::find($id);

        $tasks->delete();

        return redirect()->route('task.status');
    }
}
