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
        @show
    </head>
    <body id="home">

        <div class="ui inverted masthead centered segment">
            <div class="ui page grid">
                <div class="column">
                    <div class="ui secondary pointing menu">
                        <a class="logo item">
                            startup
                        </a>
                        <a class="active item">
                            <i class="flaticon-home"></i> Home
                        </a>
                        <a class="item">
                            <i class="flaticon-mail"></i> Messages
                        </a>
                        <a class="item">
                            <i class="flaticon-heart"></i> Friends
                        </a>
                        <div class="right menu">
                            <div class="item">
                                <div class="ui icon input">
                                    <input placeholder="Search..." type="text">
                                    <i class="flaticon-position link icon"></i>
                                </div>
                            </div>
                            <a class="ui item">
                                Logout
                            </a>
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
                <div class="four column row">

                    <div class="column">
                        <h5 class="ui inverted header">Courses</h5>
                        <div class="ui inverted link list">
                            <a class="item">Registration</a>
                            <a class="item">Course Calendar</a>
                            <a class="item">Professors</a>
                        </div>
                    </div>
                    <div class="column">
                        <h5 class="ui inverted header">Library</h5>
                        <div class="ui inverted link list">
                            <a class="item">A-Z</a>
                            <a class="item">Most Popular</a>
                            <a class="item">Recently Changed</a>
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
                        <h5 class="ui inverted header">Designed By</h5>
                        <addr>
                            <a class="item" href="http://scripteden.com"><img src="images/scripteden-logo-g.png" alt="Logo" style="height:20px" /></a>  <br/>
                            <a href="http://scripteden.com/downloads/bootstrap/">Bootstrap Templates</a>           <br/>
                            <a href="http://scripteden.com/downloads/semantic-ui/">Semantic UI Templates</a>
                        </addr>


                    </div>
                </div>



            </div>
        </div>


        @section('javascripts')

        @show
    </body>
</html>
