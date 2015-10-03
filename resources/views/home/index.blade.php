@extends('layouts.master')

@section('styles')
@parent
@endsection

@section('content')
<div class="ui transition information">
    <h1 class="ui inverted centered header">
        Blessed to bless others
    </h1>
    <p class="ui centered lead">At least he won't reach his highest potential unless<br/>you enroll him in Cat University's 2013 class.</p>
    <a href="#" class="large basic inverted animated fade ui button">
        <div class="visible content">Come to ICU 2013</div>
        <div class="hidden content">Register Now</div>
    </a>
    <div class="ui centerted image">
        <img src="/image/banner.png" />
    </div>
</div>
@endsection

@section('javascripts')
@parent
<script>
</script>
@endsection