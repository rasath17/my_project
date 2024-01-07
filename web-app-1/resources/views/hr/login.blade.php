@extends('layout.login')
@section('section_1')
    <form method="post" action="{{route('hr.check')}}">
        @csrf
        <label>HR Login</label>
        <span><small> @error('email')
                {{$message}}
                @enderror</small></span>
        <span><small>@error('error'){{$message}}
                @enderror</small></span>
        <span><small id="emailErr"></small></span>

        <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        <span><small> @error('password')
                {{$message}}
                @enderror
           </small></span>
        <span><small id="passwordErr"></small></span>

        <input type="password" id="password" name="password" placeholder="Password">

        <button type="submit" onclick="return valid()">Login</button>
    </form>
@endsection
