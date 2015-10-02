@extends('layouts.master')
@section('contents')
<div class="ui container">
  <h1>Edit Project</h1>
  <form class="ui form" action="/update-project" method="post" enctype="multipart/form-data">
    <div class="field">
      <input name="id" type="hidden" placeholder="Project Title" value="{{ $detProject->_id }}">
    </div>
    <div class="field">
      <input name="title" type="text" placeholder="Project Title" disabled value="{{ $detProject->title }}">
    </div>
    <div class="field">
      <label>Project Main Image</label>
      <div class="ui labeled input">
        <div class="ui label"><label for="file">Browse</label></div>
        <input type="text" placeholder="Project Image [*.jpeg, *.jpg, *.png]" id="fake-file-path" value="{{ $detProject->mainImage }}">
        <input name="mainImage" type="file" id="file" style="display:none" accept=".jpeg, .jpg, .png">
      </div>
    </div>
    <div class="field">
      <select class="ui search dropdown" name="category" id="idCategory">
        <option value="">Choose Category...</option>
        <option value="education" {{ $detProject->category === 'education' ? 'selected' : '' }}>Education</option>
        <option value="healthcare" {{ $detProject->category === 'healthcare' ? 'selected' : '' }}>Healthcare</option>
        <option value="social-service" {{ $detProject->category === 'social-service' ? 'selected' : '' }}>Social Service</option>
      </select>
    </div>
    <div class="field">
      <label>Project Story</label>
      <textarea name="description">{{ $detProject->description }}</textarea>
    </div>
    <div class="field">
      <div class="ui left icon input">
        <input name="goal" type="number" disabled placeholder="Funding Goal" value="{{ $detProject->goal }}">
        <i class="dollar icon"></i>
      </div>
    </div>
    <div class="field">
      <div class="ui left icon input">
        <input name="duration" type="number" disabled placeholder="Funding Duration in Days" value="{{ $detProject->duration }}">
        <i class="calendar icon"></i>
      </div>
    </div>
    <input class="ui submit button" type="submit" value="Submit">
    <input name="_method" type="hidden" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
  &nbsp;
</div>
@endsection
@section('javascript')
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

<script>
$('.ui.dropdown').dropdown();

$("document").ready(function(){
  $("#file")
    .change(function(){
      $("#fake-file-path").val($("#file").val().replace(/C:\\fakepath\\/i, ''));;
    });
});

$('#idCategory option:selected').text("{{ $detProject->category }}");

</script>
@endsection
