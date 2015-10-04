@extends('layouts.master')

@section('styles')
@parent
@endsection

@section('content')
<div class="ui transition information">
    <h1 class="ui inverted centered header">
        Blessed to bless others
    </h1>
    <p class="ui centered lead">
        CREDIBLE ONLINE FUNDRAISING WITH THE SOLE PURPOSE OF BLESSING OTHERS<br />
        CURATED BY CREDIBLE ORGANIZATION / INDIVIDUAL
    </p>
    @if(!Auth::check())
    <a href="/projects" class="large basic inverted animated fade ui button">
        <div class="visible content">Start become blessing</div>
        <div class="hidden content">And spread God's love</div>
    </a>
    @endif
</div>
@endsection

@section('javascripts')
@parent
<script>
</script>
@endsection
