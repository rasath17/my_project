@extends('layout.default')

@section('employee.sidebar')


    <li class="nav-item">
        <a href="{{route('employee.daily.task',auth()->id())}}" class="nav-link">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
                Daily Task
            </p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('employee.trainee.status',auth()->id())}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Trainee Status
            </p>
        </a>
    </li>
@endsection


@section('employee.logout')
    {{route('employee.logout')}}
@endsection
