@extends('layouts.master')

@section('content')
<form method="post" action="" class="ui form">
    {!! csrf_field() !!}
    <div class="field">
        <label>To :</label>
    </div>
    <div class="field">
        <label>{{ $member->first_name }} {{ $member->last_name }}</label>
    </div>
    <div class="field">
        <label>Subject :</label>
        <input type="text" name="subject"/>
    </div>
    <div class="field">
        <label>Message :</label>
        <textarea name="message"></textarea>
    </div>
    <div class="field">
        <button class="ui blue button">Send</button>
    </div>
</form>
@endsection