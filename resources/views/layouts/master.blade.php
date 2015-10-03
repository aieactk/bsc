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
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.js"></script>
        <link rel="stylesheet" href="/css/main.css">
        @show
    </head>
    <body id="home">

        <div id="top-menu" class="ui inverted masthead centered segment">
            <div class="ui page grid">
                <div class="column">
                    <div class="ui secondary pointing menu">
                        <a class="logo item">
                            Blessing Supply Chain
                        </a>
                        <a class="{{ Request::path() === '/' ? 'active' : '' }} item"
                           href="/">
                            <i class="home icon"></i> Home
                        </a>
                        <a class="{{ Request::path() === '/projects' ? 'active' : '' }} item"
                           href="/projects">
                            <i class="list layout icon"></i> Projects
                        </a>
                        <a class="{{ Request::path() === '/profile' ? 'active' : '' }} item"
                           href="/profile">
                            <i class="user icon"></i> Profile
                        </a>
                        <div class="right menu">
<!--                            <div class="item">
                                <div class="ui icon input">
                                    <input placeholder="Search..." type="text">
                                    <i class="flaticon-position link icon"></i>
                                </div>
                            </div>-->
                            @if(Auth::check())
                            <a class="ui item" href="/auth/logout">
                                Logout
                            </a>
                            @else
                            <a class="ui item" href="/auth/login">
                                Login
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui inverted masthead centered segment">
            <div class="ui page grid">
                <div class="column">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="ui inverted footer vertical segment center">
            <div class="ui stackable center aligned page grid">
                <div class="three column row">

                    <div class="column">
                        <h5 class="ui inverted header">Find us at</h5>
                        <div class="ui inverted link">
                            <a class="item"><i class="facebook square icon large"></i></a>
                            <a class="item"><i class="twitter square icon large"></i></a>
                        </div>
                    </div>
                    <div class="column">
                        <h5 class="ui inverted header">Community</h5>
                        <div class="ui inverted link list">
                            <a class="item">BBS</a>
                            <a class="item">Careers</a>
                            <a class="item">Privacy Policy</a>
                        </div>
                    </div>

                    <div class="column">
                        <h5 class="ui inverted header">Supported By</h5>
                        <addr>
                            <a href="http://codeforthekingdom.org">codeforthekingdom.org</a><br/>
                        </addr>


                    </div>
                </div>

            </div>
        </div>


        @section('javascripts')
        <script>
        </script>
        @show
    </body>
</html>
