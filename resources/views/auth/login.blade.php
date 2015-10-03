@extends('layouts.master')

@section('content')
<form method="POST" action="/auth/login" class="ui form">
    {!! csrf_field() !!}

    <div class="field">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="field">
        <label>Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div class="field">
        <button type="submit" class="ui button blue">Login</button>
    </div>
</form>
@endsection