
@extends('layout.hr')


@section('content')

    <form method="post" action="{{route('task.store',auth()->id())}}">
        @csrf


        <div class="card-body mt-1 ">
            <div class="form-group">
                <label for="employee_id">Employee Id</label>
                <input type="text" name="employee_id" class="form-control"
                       id="employee_id" placeholder="Enter employee id">
            </div>
            <div class="form-group">
                <label for="trainee_id">Trainee Id</label>
                <input type="text" name="trainee_id" class="form-control"
                       id="trainee_id" placeholder="Enter trainee id">
            </div>
            <div class="task">
                <label for="task">Task</label>
                <input type="text" name="task" class="form-control"
                       id="task" placeholder="Enter task">
            </div>
            <input type="hidden" name="customer_id" value="{{1}}">
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>


    <style>

    </style>
@endsection
