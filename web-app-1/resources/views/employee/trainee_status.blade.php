@extends('layout.employee')


@section('content')

    <h1>
        Trainee Status
    </h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Task</th>
                <th>Trainee Id</th>
                <th>Trainee Name</th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody>

            @foreach($tasks as $key => $task)
                <tr>
                    @if($task->trainee_status!==0)
                    <td>{{$key+1}}</td>
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

                        @if($task->trainee_status===1)
                            <button style="width: 100%" disabled class="btn btn-primary">Pending</button>
                        @endif
                        @if($task->trainee_status===2)
                            <button style="width: 100%" disabled class="btn btn-success">Completed</button>
                        @endif
                    </td>
                </tr>
                @endif

            @endforeach
            </tbody>
        </table>
    <div class="col-md-12">
        {!!$tasks->links() !!}

    </div>

@endsection
