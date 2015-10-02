<html>
  <head>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.js"></script>
  </head>
  <body>
    <div class="ui container">
      <h1>This is List Project</h1>
      <div class="ui four stackable cards">
        @foreach ($projects as $project)
        <div class="card">
          <div class="image">
            <img src="{!! asset('image/' . $project->mainImage) !!}">
          </div>
          <div class="content">
            <div class="header"><a href="/project/{{$project->_id}}">{{$project->title}}</a></div>
            <div class="description">{!! str_limit($project->description, $limit = 450, $end = '...') !!}</div>
          </div>
          <div class="extra content"><i class="dollar icon"></i>{{$project->goal}}</div>
          <div class="extra content"><i class="dollar icon"></i>{{$project->duration}}</div>
        </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
