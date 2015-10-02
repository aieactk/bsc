@extends('layouts.master')

@section('content')
<form method="POST" action="/auth/register" class="ui form">
    {!! csrf_field() !!}
    <div class="field @if($errors->get('first_name')) error @endif">
        <label>First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}">
    </div>
    <div class="field">
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}">
    </div>
    <div class="field">
        <label>Gender</label>
        <select name="gender">
            <option value="m">Male</option>
            <option value="f">Female</option>
        </select>
    </div>
    <div class="field @if($errors->get('email')) error @endif">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="field @if($errors->get('password')) error @endif">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="field">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
    </div>
    <div class="field @if($errors->get('phone')) error @endif">
        <label>Phone Number</label>
        <input type="text" name="phone">
    </div>
    <div class="field @if($errors->get('address_1')) error @endif">
        <label>Address</label>
        <input type="text" name="address_1">
    </div>
    <div class="field">
        <input type="text" name="address_2">
    </div>
    <div class="field">
        <button type="submit" class="ui green button">Register</button>
    </div>
</form>
@endsection