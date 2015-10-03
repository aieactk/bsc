@extends('layouts.master')

@section('content')
<h1>{{ $user->last_name }} Profile</h1>
<div class="ui equal width grid">
    <div class="six wide column">
        <div class="ui medium image">
            <img src="{{$user->image ? URL::to('/').$user->image : '#'}}" class="ui medium image" />
            <br/>
            @if($user->_id !== \Auth::user()->_id)
            <a href="/members/{{$user->_id}}/message" class="ui labeled icon button">
                <i class="mail icon"></i> Message
            </a>
            @endif
        </div>
    </div>
    <div class="ten wide column">
        <div class="ui grid">
            <label class="six wide column">First Name</label>
            <label class="eight wide column">{{ $user->first_name }}</label>
            <label class="six wide column">Last Name</label>
            <label class="eight wide column">{{ $user->last_name }}</label>
            <label class="six wide column">Gender</label>
            <label class="eight wide column">@if($user->gender === 'm') Male @else Female @endif</label>
            <label class="six wide column">Phone Number</label>
            <label class="eight wide column">{{$user->phone}}</label>
            <label class="six wide column">Address</label>
            <label class="eight wide column">{{$user->address_1}} {{$user->address_2}}</label>
        </div>
    </div>
</div>
@endsection