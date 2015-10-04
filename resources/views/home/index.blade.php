@extends('layouts.master')

@section('styles')
@parent
@endsection

@section('content')
<div class="ui transition information">
    <h1 class="ui inverted centered header">
        Blessed to bless others
    </h1>
    <p class="ui centered lead">Why Blessing Supply Chain?</p>
    @if(!Auth::check())
    <a href="#" class="large basic inverted animated fade ui button">
        <div class="visible content">Start become blessing</div>
        <div class="hidden content">And spread God's love</div>
    </a>
    @endif
    <div class="ui centerted image">
        <img src="/image/bsc-front.jpg" />
    </div>
</div>
@endsection

@section('javascripts')
@parent
<script>
</script>
@endsection
