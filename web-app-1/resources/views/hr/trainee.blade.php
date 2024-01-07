@extends('layout.hr')
@section('content')






    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Trainee Id</th>
            <th>Trainee Name</th>
            <th>Phone Number</th>
        </tr>
        </thead>
        <tbody>

        @foreach($trainees as $key => $trainee)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$trainee->id}}</td>
                <td>{{$trainee->name}}</td>
                <td>{{$trainee->phone}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="col-md-12">
        {!!$trainees->links() !!}

    </div>
@endsection
