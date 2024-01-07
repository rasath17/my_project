@extends('layout.employee')


@section('content')

    <h1>
        Daily Task

    </h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>HR name</th>
            <th>Task</th>
            <th>Trainee Id</th>
            <th>Trainee Name</th>
            <th>Accept</th>

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
                    @endforeach
                </td>
                <td>{{$task->task}}</td>
                <td>{{$task->trainee_id}}</td>
                <td>
                    @foreach($trainees as $keys => $trainee)
                        @if($trainee->id===$task->trainee_id)
                            {{$trainee->name}}
                            @break('trainee')
                        @endif
                    @endforeach
                </td>
                <td>
                    @if($task->employee_status===0)
                        <form action="{{route('employee.daily.task.accept',$task->id)}}" method="post"
                              class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            <button class="btn btn-success d-inline" type="submit">Accept</button>
                        </form>
                        <form action="{{route('employee.daily.task.delete',$task->id)}}" method="post" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            <button class="btn btn-danger d-inline" type="submit">Reject</button>
                        </form>
                    @endif
                    @if($task->employee_status===1)
                        <button style="width: 100%" disabled class="btn btn-success ">Accepted</button>
                    @endif
                    @if($task->employee_status===2)
                        <button style="width: 100%" disabled class="btn btn-danger">Rejected</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12">
        {!!$tasks->links() !!}

    </div>
@endsection
