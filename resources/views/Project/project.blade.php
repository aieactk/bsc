@extends('layouts.master')
@section('content')
<h1>This is List Project</h1>
<div class="ui four stackable cards">
    @foreach ($projects as $project)
    <div class="card">
        <div class="image">
            <img src="{!! asset('upload/project/' . $project->mainImage) !!}">
        </div>
        <div class="content">
          <div class="header"><a href="/project/{{$project->_id}}">{{$project->title}}</a></div>
          <div class="description">{!! str_limit($project->description, $limit = 450, $end = '...') !!}</div>
        </div>
        <div class="extra content"><i class="dollar icon"></i>{{$project->goal}}</div>
        <div class="extra content"><i class="calendar icon"></i>until {{$project->duration}}</div>
    </div>
    @endforeach
</div>
@endsection
