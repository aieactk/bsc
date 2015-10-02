<html>
    <head>
        <title>App Name - @yield('title')</title>
        @section('styles')
        <link rel="stylesheet" href="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.css">
        @endsection
        @section('javascripts')
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.js"></script>
        @endsection
    </head>
    <body>
        <div class="ui container">
            @section('content')
            @yield('content')
        </div>
    </body>
</html>