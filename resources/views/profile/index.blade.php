@extends('layouts.master')

@section('content')
@if(Auth::user() === $user)
<h1>My Profile</h1>
@else
<h1>My Profile</h1>
@endif
<div class="ui three column divided grid">
    <div class="six wide column">
        <div class="ui medium image" @if(Auth::user() === $user) id="profile-img" @endif >
            <div class="ui dimmer">
                <div class="content">
                    <div class="center">
                        <form action="/profile/image" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="field">
                                <input type="file" name="image" />
                                <button class="ui blue button">Change Picture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <img src="{{$user->image ? URL::to('/').$user->image : '#'}}" class="ui medium image" />
        </div>
    </div>
    <div class="ten wide column">
        <form class="ui form" method="post" action="">
            <div class="field @if($errors->get('first_name')) error @endif">
                <label>First Name <span class="text-red">*</span></label>
                <input type="text" name="first_name" class="ui red" value="{{$user->first_name}}" />
            </div>
            <div class="field">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{$user->last_name}}" />
            </div>
            <div class="field">
                <label>Gender</label>
                <select name="gender">
                    <option value="m" @if($user->gender === 'm')selected="selected"@endif>Male</option>
                    <option value="f" @if($user->gender === 'f')selected="selected"@endif>Female</option>
                </select>
            </div>
            <div class="field @if($errors->get('phone')) error @endif">
                <label>Phone Number <span class="text-red">*</span></label>
                <input type="text" name="phone" value="{{$user->phone}}" />
            </div>
            <div class="field @if($errors->get('address_1')) error @endif">
                <label>Address <span class="text-red">*</span></label>
                <input type="text" name="address_1" value="{{$user->address_1}}"/>
            </div>
            <div class="field">
                <input type="text" name="address_2" value="{{$user->address_2}}"/>
            </div>
            {!! csrf_field() !!}
            @if(Auth::user() === $user)
            <button class="ui button success">Save</button>
            
            @endif
        </form>
    </div>
    @section('javascripts')
        @parent
        @if(Auth::user() === $user)
        <script>
            $('#profile-img').dimmer({
                on: 'hover'
            });
        </script>
        @endif
    @endsection
    
</div>
@endsection