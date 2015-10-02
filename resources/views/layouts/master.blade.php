<!DOCTYPE html>
<html>
    <head>
        <!-- Standard Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>Blessing Supply Chain - @yield('title')</title>
        @section('styles')
        <link rel="stylesheet" href="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.css">
        @show
    </head>
    <body id="home">
        @yield('content')

        @section('javascripts')
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.js"></script>
        @show
    </body>
</html>

