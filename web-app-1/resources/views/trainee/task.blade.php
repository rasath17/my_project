@extends('layout.trainee')
@section('content')

    <h1>
        Task
    </h1>

    <table class="table table-sm">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Task</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $key => $task)
            @if($task->trainee_status===1 || $task->trainee_status===2)

                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$task->task}}</td>
                    <td>
                        @if($task->trainee_status===1)
                            <button style="width: 100%" disabled class="btn btn-primary">Pending</button>

                        @endif
                        @if($task->trainee_status===2)
                            <button style="width: 100%" disabled class="btn btn-success">Completed</button>
                        @endif
                    </td>
                    <td>
                        @if($task->trainee_status===1)
                            <form action="{{route('trainee.complete',$task->id)}}" method="post"
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                                <button class="btn btn-success">Completed</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endif
        </tbody>
        @endforeach
    </table>
    <div class="col-md-12">
        {!!$tasks->links() !!}

    </div>
@endsection
