@extends('layouts.master')

@section('content')
<form method="post" action="/messages/{{$context->_id}}" class="ui form">
    {!! csrf_field() !!}
    <input type="hidden" name="context" value="{{$context->_id}}"/>
    <div class="field">
        <label>Subject : {{$context->subject}}</label>
    </div>
    <div class="field">
        <label></label>
    </div>
    <div class="ui visible message">
        <p>&gt; <i>{{$context->fromMember->last_name}} at &lt;{{$context->created_at}}&gt;</i> says: &quot;{{$context->message}}&quot;</p>
        @foreach($context->replies as $msg)
        <p>&gt; <i>{{$msg->fromMember->first_name}} &lt;{{$msg->created_at}}&gt;</i> says: &quot;{{$msg->message}}&quot;</p>
        @endforeach
    </div>
    <div>
    <div class="field">
        <label>Reply</label>
        <textarea name="message"></textarea>
    </div>
    <div class="field">
        <a href="/messages" class="ui button">Back</a>
        <button class="ui blue button">Send</button>
    </div>
</form>
@endsection