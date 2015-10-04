@extends('layouts.master')
@section('content')
<h1>
    Awesome Projects
</h1>
<a href="/create-project" class="ui button green">
    Start your own project
</a>
<div id="header-menu" class="ui text menu">
    <div class="header item">Select category</div>
    <a href="/projects" data-category="all"
       class="item {{ Request::path() === '/projects' ? 'active' : '' }}" >
        All
    </a>
    <a href="/projects?cat=education" data-category="education"
       class="item {{ Request::path() === '/projects?cat=education' ? 'active' : '' }}" >
        Education
    </a>
    <a href="/projects?cat=healthcare" data-category="healthcare"
       class="item {{ Request::path() === '/projects?cat=social-service' ? 'active' : '' }}" >
        Healthcare
    </a>
    <a href="/projects?cat=social-service" data-category="social-service"
       class="item {{ Request::path() === '/projects?cat=social-service' ? 'active' : '' }}" >
        Social Service
    </a>
</div>
<div id="project-container" class="ui four stackable cards">
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
            <?PHP
            $img = getimagesize(asset('upload/project/' . $project->mainImage));
            $imgH = $img[1] * 150 / $img[0];
            $mTop = ((150 - $imgH) / 2) - 2;
            $css = $img[0] > $img[1] ? 'margin:' . $mTop . 'px 0;' : 'max-height:150px;margin:auto;width:auto;';
            ?>
            <img src="{!! asset('upload/project/' . $project->mainImage) !!}"
                 style="{{ $css }}" />
        </div>
        <div class="content">
            <a class="header" href="/project/{{$project->_id}}">{{$project->title}}</a>
            <div class="meta">
                <span class="date">
                    {!! str_limit($project->description, $limit = 150, $end = '...') !!}
                </span>
            </div>
        </div>
        <div class="extra content"><i class="dollar icon"></i>{{$project->goal}}</div>
        <div class="extra content"><i class="calendar icon"></i>until {{$project->duration}}</div>
    </div>
    @endforeach
</div>
@endsection
