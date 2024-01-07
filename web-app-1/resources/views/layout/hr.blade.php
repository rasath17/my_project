
@extends('layout.default')

@section('hr.sidebar')
    <li class="nav-item">
        <a href="{{route('task.create')}}" class="nav-link">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
                Task create
            </p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('task.status')}}" class="nav-link">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
                Task Status
            </p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('hr.employee')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Employees details
            </p>
        </a>
    </li>


    <li class="nav-item">
        <a href="{{route('hr.trainee')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Trainee details
            </p>
        </a>
    </li>
@endsection


@section('hr.logout')
    {{route('hr.logout')}}
@endsection
