@extends('layout.hr')
@section('content')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>HR name</th>
            <th>Task</th>
            <th>Employee Name (ID)</th>
            <th>Employee Status</th>
            <th>Trainee Name (ID)</th>
            <th>Trainee Status</th>
            <th>Changes</th>

        </tr>
        </thead>
        <tbody>

        @foreach($tasks as $key => $task)
            <tr>
                <td>{{$key+1}}</td>
                <td>
                    @foreach($hrs as $keys => $hr)
                        @if($hr->id===$task->hr_id)
                            {{$hr->name}}
                            @break('hr')
                        @endif
                    @endforeach</td>
                <td>{{$task->task}}</td>
                <td>
                    @foreach($employees as $keys => $employee)
                        @if($employee->id===$task->employee_id)
                            {{$employee->name}}
                            @break('$employee')
                        @endif
                    @endforeach
                        ({{$task->employee_id}})
                </td>
                <td>
                    @if($task->employee_status===0)
                        <button style="width: 100%" class="btn btn-warning" disabled>Pending</button>
                    @endif
                    @if($task->employee_status===1)
                        <button style="width: 100%" class="btn btn-success" disabled>Accepted</button>
                    @endif
                    @if($task->employee_status===2)
                        <button style="width: 100%" class="btn btn-danger" disabled>Rejected</button>
                    @endif


                </td>
                <td>
                    @foreach($trainees as $keys => $trainee)
                        @if($trainee->id===$task->trainee_id)
                            {{$trainee->name}}
                            @break('trainee')
                        @endif
                    @endforeach
                ({{$task->trainee_id}})
                </td>
                <td>
                    @if($task->trainee_status===0)
                        <button style="width: 100%" class="btn btn-warning" disabled>Not Assigned</button>
                    @endif
                    @if($task->trainee_status===1)
                        <button style="width: 100%" class="btn btn-primary" disabled>Pending</button>
                    @endif
                    @if($task->trainee_status===2)
                        <button style="width: 100%" class="btn btn-success" disabled>Completed</button>
                    @endif

                </td>
                <td>
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('task.destroy', $task->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    <div class="col-md-12">
        {!!$tasks->links() !!}
    </div>

@endsection


<!---
           <p style="padding: 10px; background-color: yellow; border-radius: 10% ; margin: 5%">Not-Assigned</p>
-->
