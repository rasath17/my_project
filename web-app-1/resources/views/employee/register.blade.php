@extends('layout.register')
@section('section_1')
    <form method="post" action="{{route('employee.create')}}">
        @csrf
        <label>Employee Register </label>
        <span><small>@error('name')
                {{$message}}
                @enderror
            </small></span>

        <span><small id="nameErr"></small></span>

        <input type="text" name="name" id="name" placeholder="Name" value="{{old('name')}}">
        <span><small>@error('email')
                {{$message}}
                @enderror</small></span>

        <span><small id="emailErr"></small></span>

        <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        <span><small>@error('phone')
                {{$message}}
                @enderror</small></span>

        <span><small id="phoneErr"></small></span>

        <input type="text" name="phone" id="phone" placeholder="Phone" value="{{old('phone')}}">
        <span><small>@error('password')
                {{$message}}
                @enderror</small></span>

        <span><small id="passwordErr"></small></span>

        <input type="password" name="password" id="password" placeholder="Password" value="{{old('password')}}">

        <span><small id="password_confirmationErr"></small></span>

        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
               value="{{old('password_confirmation')}}">

        <button type="submit" onclick="return valid()">Register</button>
    </form>

@endsection
