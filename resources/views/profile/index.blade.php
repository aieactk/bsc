@extends('layouts.master')

@section('content')
@if(Auth::user() === $user)
<h1>My Profile</h1>
@else
<h1>My Profile</h1>
@endif
<div class="ui three column divided grid">
    <div class="six wide column">
        <div class="ui medium image" @if(Auth::user() === $user) id="profile-img" @endif 
             style="border-radius:50%;">
            <div class="ui dimmer" style="border-radius:50%;">
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
            <img src="{{$user->image ? URL::to('/').$user->image : 'data:image/png;base64,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'}}" 
             class="ui medium image" style="border-radius:50%" />
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
            <button class="ui button green">Save</button>
            
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