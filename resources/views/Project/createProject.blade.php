@extends('layouts.master')
@section('content')
<div class="ui container">
  <h1>Create New Project</h1>
  <form class="ui form" action="/submit-project" method="post" enctype="multipart/form-data">
    <div class="field">
      <input name="title" type="text" placeholder="Project Title">
    </div>
    <div class="field">
      <label>Project Main Image</label>
      <div class="ui labeled input">
        <div class="ui label"><label for="file">Browse</label></div>
        <input type="text" placeholder="Project Image [*.jpeg, *.jpg, *.png]" id="fake-file-path">
        <input name="mainImage" type="file" id="file" style="display:none" accept=".jpeg, .jpg, .png">
      </div>
    </div>
    <div class="field">
      <select class="ui search dropdown" name="category">
        <option value="">Choose Category...</option>
        <option value="education">Education</option>
        <option value="healthcare">Healthcare</option>
        <option value="social-service">Social Service</option>
      </select>
    </div>
    <div class="field">
      <label>Project Story</label>
      <textarea name="description"></textarea>
    </div>
    <div class="field">
      <div class="ui left icon input">
        <input name="goal" type="number" placeholder="Funding Goal">
        <i class="dollar icon"></i>
      </div>
    </div>
    <div class="field">
      <div class="ui left icon input">
        <input type="text" id="datepicker" name="endDate" placeholder="End of Funding (dd/mm/yyyy)">
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
@section('javascripts')
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

</script>
@endsection
