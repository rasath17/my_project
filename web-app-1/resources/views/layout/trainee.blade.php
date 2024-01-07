@extends('layout.default')
@section('trainee.sidebar')

    <li class="nav-item">
        <a href="{{route('trainee.task',auth()->id())}}" class="nav-link">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
                Task
            </p>
        </a>
    </li>


@endsection


@section('employee.logout')
    {{route('trainee.logout')}}
@endsection
