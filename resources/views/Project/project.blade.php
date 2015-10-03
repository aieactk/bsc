@extends('layouts.master')
@section('content')
<h1>This is List Project</h1>
<div class="ui four stackable cards">
    @foreach ($projects as $project)
    <div class="ui card">
        <div class="blurring dimmable image">
            <div class="ui dimmer transition hidden">
                <div class="content">
                    <div class="center">
                        <div class="ui inverted button">Call to Action</div>
                    </div>
                </div>
            </div>
            <img src="{!! asset('image/' . $project->mainImage) !!}" />
        </div>
        <div class="content">
            <a class="header" href="/project/{{$project->_id}}">{{$project->title}}</a>
            <div class="meta">
                <span class="date">
                    {!! str_limit($project->description, $limit = 150, $end = '...') !!}
                </span>
            </div>
        </div>
        <div class="extra content">
            <i class="dollar icon"></i>Rp. {{$project->goal}}
            <a>
                <i class="calendar icon"></i>Until {{$project->duration}}
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
