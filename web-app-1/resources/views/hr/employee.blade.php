@extends('layout.hr')
@section('content')






    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Employee Id</th>
            <th>Employee Name</th>
            <th>Phone Number</th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $key => $employee)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->phone}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="col-md-12">
        {!!$employees->links() !!}

    </div>

@endsection
