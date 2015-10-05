@extends('layouts.master')

@section('content')
<h2>Incoming messages</h2>
<div class="ui middle aligned divided list">
    @foreach( $messages as $message )
    <div class="item">
        <div class="right floated content">
            <a href="/messages/{{ $message->_id }}" 
               class="ui small icon button btn-confirm"
               data-target="#delete_{{ $message->_id }}"
               data-title="Delete message confirmation"
               data-message="Are you sure you want to delete this message?">
                <i class="trash icon"></i>
            </a>
            <form 
                method="post" 
                action="/messages/delete"
                id="delete_{{ $message->_id }}">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{ $message->_id }}" />
            </form>
        </div>
        <img class="ui avatar image left floated" src="/image/_blank.png">
        <a href="/messages/{{ $message->_id }}">
            <div class="content">
                <div class="ui header">{{ $message->subject }}</div>
                <i>{{ $message->fromMember->first_name }}</i>
            </div>
        </a>
    </div>
    @endforeach
    @section('javascripts')
        @parent()
        <script src="js/app.js"></script>
    @endsection
</div>
@endsection