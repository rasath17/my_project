<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="antialiased">

<center>
    <br> <a href="{{route('employee.login')}}">
        <button class="btn btn-primary mb-3">Employee Login</button>
    </a>
    <a href="{{route('employee.register')}}">
        <button class="btn btn-primary mb-3">Employee Register</button>
    </a>

    <br>


    <a href="{{route('trainee.login')}}">
        <button class="btn btn-danger mb-3">Trainee Login</button>
    </a>
    <a href="{{route('trainee.register')}}">
        <button class="btn btn-danger mb-3">Trainee Register</button>
    </a>

    <br>


    <a href="{{route('hr.login')}}">
        <button class="btn btn-warning mb-3">HR Login</button>
    </a>
    <a href="{{route('hr.register')}}">
        <button class="btn btn-warning mb-3">Hr Register</button>
    </a>


</center>

</body>
</html>
