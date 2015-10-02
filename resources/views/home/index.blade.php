@extends('layouts.master')

@section('styles')
@parent
<style>
    /*******************************
            Global
*******************************/

    html {
        font-size: 14px;
    }


    /*******************************
                Global
    *******************************/

    #home .menu .right.menu > .mobile.item {
        display: none;
    }

    .ui.form input:not([type]), .ui.form input[type="text"], .ui.form input[type="email"], .ui.form input[type="date"], .ui.form input[type="datetime-local"], .ui.form input[type="password"], .ui.form input[type="number"], .ui.form input[type="url"], .ui.form input[type="tel"]{

        box-shadow: none;
        border-color: #e6eaed;
        background: #fff;

    }

    .ui.form input:focus:not([type]), .ui.form input[type="text"]:focus, .ui.form input[type="email"]:focus, .ui.form input[type="date"]:focus, .ui.form input[type="datetime-local"]:focus, .ui.form input[type="password"]:focus, .ui.form input[type="number"]:focus, .ui.form input[type="url"]:focus, .ui.form input[type="tel"]:focus
    {

        box-shadow: none;
        border-color: #ddd;
        background: #fff;

    }


    /*--------------
        Masthead
    ---------------*/

    #home .masthead {
        background: rgb(24,42,115);
        background: -moz-linear-gradient(-45deg,  rgba(24,42,115,1) 0%, rgba(33,138,174,1) 69%, rgba(32,167,172,1) 89%);
        background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(24,42,115,1)), color-stop(69%,rgba(33,138,174,1)), color-stop(89%,rgba(32,167,172,1)));
        background: -webkit-linear-gradient(-45deg,  rgba(24,42,115,1) 0%,rgba(33,138,174,1) 69%,rgba(32,167,172,1) 89%);
        background: -o-linear-gradient(-45deg,  rgba(24,42,115,1) 0%,rgba(33,138,174,1) 69%,rgba(32,167,172,1) 89%);
        background: -ms-linear-gradient(-45deg,  rgba(24,42,115,1) 0%,rgba(33,138,174,1) 69%,rgba(32,167,172,1) 89%);
        background: linear-gradient(135deg,  rgba(24,42,115,1) 0%,rgba(33,138,174,1) 69%,rgba(32,167,172,1) 89%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#182a73', endColorstr='#20a7ac',GradientType=1 );
        border-radius: 0;
        margin: 0em;
        padding: 1rem 0rem 0;
    }
    #home .masthead .column {
        position: relative;
    }
    #home .masthead .information {
        margin: 6em 1em 0 1em;
        text-align: center;
    }
    #home .masthead .information p {
        display: block;
        text-align: center;
        width: 100%; 
        font-weight: 300;
        font-size: 20pt;
    }

    #home .masthead .information .button{
        margin: 40px auto 20px auto; 
        display: block; 
        width: 200px;
        border-radius: 500px;
    }

    #home .ui.vertical.feature.segment{
        border-radius: 0;
        padding-top: 0 !important;
    }
    #home .ui.vertical.feature.segment .column,
    #home .ui.vertical.feature.segment .column:after,
    #home .ui.vertical.feature.segment .column:before{
        box-shadow: none !important;
    }

    #home p.ui.centered.lead{
        font-weight: 300;
        font-size: 16pt;
        padding: 0px 30px;
        line-height: 1.5;
        text-align: center;
        margin-bottom: 0.7em;
    }
    #home .ui.vertical.feature.segment p{
        font-weight: 300;
        font-size: 11pt;
        padding: 15px 30px;
        line-height: 1.5;
    }

    #home .ui.vertical.feature.segment .column .ui.icon.header{
        margin-top: 10px;
    }

    #home .column-feature .ui.icon.header .icon {
        border: 1px solid #64B244;
        color: #64B244;
        border-radius: 500px;
        display: block;
        float: none;
        font-size: 2em;
        height: 80px;
        line-height: 80px;
        margin: 0 auto 15px;
        opacity: 1;
        padding: 0;
        width: 80px;
    }

    #home .ui.vertical.feature.segment .column.column-feature:hover{
        background: #fafafa !important;
    }
    #home .ui.vertical.feature.segment .column.column-feature{
        border: 1px solid #eee;
        border-top: 0;   
    }

    #home .ui.vertical.feature.segment .column.column-feature:nth-child(2){
        border-left: 0;
        border-right: 0;
    }

    #home .subscribe.column{
        padding: 0 !important;box-shadow: none !important;border:0 !important;
    }

    #home h3.subscribe-header{
        font-weight: 300;margin: 0;padding: 30px 0 0 0;font-size: 16pt;letter-spacing: 1px;
    }

    .ui.secondary.pointing.menu {
        border-bottom: 1px solid rgba(255,255,255, 0.1);
    }
    .ui.menu .logo.item{
        font-weight: 800;color: #ffffff;font-size: 16pt;padding: 0 10px !important;
    }
    .ui.menu .item{
        color: rgba(255,255,255,0.4);

    }
    .ui.secondary.pointing.menu > .menu > .item, .ui.secondary.pointing.menu > .item{
        border-bottom-width: 1px;
        margin: 0 0 -1px;
    }

    .ui.secondary.pointing.menu .item .ui.input input{
        color: rgba(255,255,255,0.6); 
    }
    .ui.secondary.pointing.menu .item i{
        margin-right: 3px;
        color: rgba(255,255,255,0.6);
    }

    .ui.secondary.pointing.menu > .menu > .item:not(.logo), .ui.secondary.pointing.menu > .item:not(.logo){
        padding: 1em 0;
        margin-left: 1em;
        margin-right: 1em;
    }

    .ui.secondary.pointing.menu > .menu > .link.item:hover, .ui.secondary.pointing.menu > .link.item:hover, .ui.secondary.pointing.menu > .menu > a.item:hover, .ui.secondary.pointing.menu > a.item:hover{
        color: rgba(255,255,255,0.6);
    }
    .ui.secondary.pointing.menu > .menu > .item.active, .ui.secondary.pointing.menu > .item.active{
        color: rgba(255,255,255,0.6);
    }

    .ui.secondary.pointing.menu > .menu > .item.active, .ui.secondary.pointing.menu > .item.active{
        border-color: rgba(255,255,255,0.2);
    }

    /*-----------------
        Recent Works
    ------------------*/

    .ui.recent-works{
        background: rgb(14,21,58);
        background: -moz-linear-gradient(45deg,  rgba(14,21,58,1) 0%, rgba(115,107,147,1) 48%, rgba(243,201,215,1) 100%);
        background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(14,21,58,1)), color-stop(48%,rgba(115,107,147,1)), color-stop(100%,rgba(243,201,215,1)));
        background: -webkit-linear-gradient(45deg,  rgba(14,21,58,1) 0%,rgba(115,107,147,1) 48%,rgba(243,201,215,1) 100%);
        background: -o-linear-gradient(45deg,  rgba(14,21,58,1) 0%,rgba(115,107,147,1) 48%,rgba(243,201,215,1) 100%);
        background: -ms-linear-gradient(45deg,  rgba(14,21,58,1) 0%,rgba(115,107,147,1) 48%,rgba(243,201,215,1) 100%);
        background: linear-gradient(45deg,  rgba(14,21,58,1) 0%,rgba(115,107,147,1) 48%,rgba(243,201,215,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0e153a', endColorstr='#f3c9d7',GradientType=1 );

    }

    .ui.recent-works .column{
        box-shadow: none !important;
    }

    .ui.recent-works p{
        color: #ffffff;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
    }

    .ui.cards > .card, .ui.card{
        box-shadow: none;
    }

    .ui.cards > .card > .buttons:last-child, .ui.card > .buttons:last-child, .ui.cards > .card > .button:last-child, .ui.card > .button:last-child{
        margin: 0;
        width: 100%;
    }


    /*--------------
        Ribbons
    ---------------*/

    #home .segment h1 {
        font-size: 3em;   
    }

    #home .vertical.segment {
        padding: 5rem 0rem;
    }

    #home .feature.segment {
        margin: 0em;
        padding: 6rem 0rem;
    }
    #home .feature.segment p {
        min-height: 50px;
    }

    #home .selection.list {
        margin: 0em -0.5em;
    }

    #home .logo.row {
        height: 10rem;
    }

    /*--------------
        Footer
    ---------------*/

    #home .footer.segment {
        background-color: #000000;
        padding: 3rem 0rem;
    }


    /*******************************
              Responsive
    *******************************/

    /* Mobile Only */
    @media only screen and (max-width : 768px) {

        #home .menu .right.menu > .item {
            display: none;
        }

        #home .menu .right.menu > .mobile.item {
            display: block;
        }
        #home .menu .right.menu > .mobile.item .menu {
            left: auto;
            right: 0em;
        }

        #home h1 {
            font-size: 1.5em;
        }
        #home .masthead.segment .information {
            margin-left: 170px;
        }

        #home .masthead.segment .image {
            width: 170px;
        }

        #home .masthead.segment .button {
            font-size: 1rem;
        }

        #home .overview .divided.grid .header .icon {
            font-size: 1.5em;
        }

        #home .overview .divided.grid .header + p {
            min-height: 0px;
        }

        #home .masthead.segment .column {
            font-size: 0.7rem;
        }

        #home .masthead.segment .column p {
            display: none;
        }

        #home .selection.list .right.floated {
            display: none;
        }
    }
</style>
@endsection

@section('content')
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

            <div class="ui hidden transition information">
                <h1 class="ui inverted centered header">
                    An Old Cat Can Learn New Tricks
                </h1>
                <p class="ui centered lead">At least he won't reach his highest potential unless<br/>you enroll him in Cat University's 2013 class.</p>
                <a href="#" class="large basic inverted animated fade ui button">
                    <div class="visible content">Come to ICU 2013</div>
                    <div class="hidden content">Register Now</div>
                </a>
                <div class="ui centerted image">
                    <img src="images/banner.png" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="fourteen wide column">
            <div class="ui three column center aligned stackable divided grid">
                <div class="column column-feature">
                    <div class="ui icon header">
                        <i class="flaticon-connecting icon"></i>
                        Courses
                    </div>
                    <p>Take your kitty to a cat-ducation course and learn how to treat her well.</p>
                    <p>
                        <a class="ui button" href="#">
                            Learn
                        </a>
                    </p>
                </div>
                <div class="column column-feature">
                    <div class="ui icon header">
                        <i class="flaticon-calendar icon"></i>
                        Library
                    </div>
                    <p>Dig through our cat library to found out amazing things you can do with your kitty.</p>
                    <p>
                        <a class="ui green right labeled icon button" href="#">
                            Research
                            <i class="right flaticon-move icon"></i>
                        </a>
                    </p>
                </div>
                <div class="column column-feature">
                    <div class="ui icon header">
                        <i class="flaticon-speech icon"></i>
                        Community
                    </div>
                    <p>Get feedback on your cat from a community of loving pet owners on our online...</p>
                    <p>
                        <a class="ui button" href="#">
                            Share
                        </a>
                    </p>
                </div>
            </div>



        </div>
    </div>

    <div class="ui centered page grid">
        <h3 class="subscribe-header">Subscribe to Mailing List</h3> 
        <p class="ui centered lead large">At least he won't reach his highest potential unless you enroll him in Cat University's 2013 class.</p>
        <div class="ui form eight wide subscribe column">

            <div class="field">

                <div class="ui fluid action input">
                    <input placeholder="Susbcribe..." type="text">
                    <div class="ui button">Susbcribe</div>
                </div>
            </div>

        </div>

    </div>       

</div>



<div class="ui recent-works vertical segment">
    <div class="ui very relaxed stackable centered page grid">
        <div class="row">
            <div class="eight wide centered column">
                <h1 class="center aligned ui inverted header">
                    Recent Works
                </h1>
                <div class="ui horizontal divider"><i class="white flaticon-camera icon"></i></div>
                <p class="ui centered lead">Checkout Our Recently Completed Works<br>you will be amazed!.</p>
            </div>
        </div>
        <div class="fourteen wide column">
            <div class="ui three column aligned stackable divided grid">



                <div class="column">

                    <div class="ui card" data-html="<div class='header'>User Rating</div><div class='content'><div class='ui star rating'><i class='active icon'></i><i class='active icon'></i><i class='active icon'></i><i class='icon'></i><i class='icon'></i></div></div>">
                        <div class="image">
                            <img src="images/totoro-horizontal.jpg">
                        </div>
                        <div class="content">
                            <div class="header">My Neighbor Totoro</div>
                            <div class="description">
                                Two sisters move to the country with their father in order to be closer to their hospitalized mother, and discover the surrounding trees are inhabited by magical spirits.
                            </div>
                        </div>
                        <div class="ui two bottom attached buttons">
                            <div class="ui button">
                                <i class="flaticon-plus icon"></i>
                                Queue
                            </div>
                            <div class="ui pink button">
                                <i class="flaticon-play icon"></i>
                                Watch
                            </div>
                        </div>
                    </div>

                </div>



                <div class="column">

                    <div class="ui card" data-html="<div class='header'>User Rating</div><div class='content'><div class='ui star rating'><i class='active icon'></i><i class='active icon'></i><i class='active icon'></i><i class='icon'></i><i class='icon'></i></div></div>">
                        <div class="image">
                            <img src="images/totoro-horizontal.jpg">
                        </div>
                        <div class="content">
                            <div class="header">My Neighbor Totoro</div>
                            <div class="description">
                                Two sisters move to the country with their father in order to be closer to their hospitalized mother, and discover the surrounding trees are inhabited by magical spirits.
                            </div>
                        </div>
                        <div class="ui two bottom attached buttons">
                            <div class="ui button">
                                <i class="flaticon-plus icon"></i>
                                Queue
                            </div>
                            <div class="ui pink button">
                                <i class="flaticon-play icon"></i>
                                Watch
                            </div>
                        </div>
                    </div>

                </div>


                <div class="column">

                    <div class="ui card" data-html="<div class='header'>User Rating</div><div class='content'><div class='ui star rating'><i class='active icon'></i><i class='active icon'></i><i class='active icon'></i><i class='icon'></i><i class='icon'></i></div></div>">
                        <div class="image">
                            <img src="images/totoro-horizontal.jpg">
                        </div>
                        <div class="content">
                            <div class="header">My Neighbor Totoro</div>
                            <div class="description">
                                Two sisters move to the country with their father in order to be closer to their hospitalized mother, and discover the surrounding trees are inhabited by magical spirits.
                            </div>
                        </div>
                        <div class="ui two bottom attached buttons">
                            <div class="ui button">
                                <i class="flaticon-plus icon"></i>
                                Queue
                            </div>
                            <div class="ui pink button">
                                <i class="flaticon-play icon"></i>
                                Watch
                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>
</div>


<div class="ui vertical segment">
    <div class="ui stackable center aligned page grid">
        <div class="row">
            <div class="eight wide column">
                <h1 class="ui header">
                    Our Clients
                </h1><div class="ui horizontal divider"><i class="flaticon-settings icon"></i></div>
                <p class="ui centered lead">
                    Many Companies Rely on Our Cat Knowledge
                </p>
                <br/>
            </div>
        </div>
        <div class="four column logo row">
            <div class="column">
                <div class="ui shape">
                    <div class="sides">
                        <div class="active side">
                            <i class="huge flaticon-facebook icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-twitter icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-pinterest icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-more icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui shape">
                    <div class="sides">
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-more icon"></i>
                        </div>
                        <div class="active side">
                            <i class="huge flaticon-twitter icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-facebook icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-twitter icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui shape">
                    <div class="sides">
                        <div class="active side">
                            <i class="huge flaticon-facebook icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-twitter icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-pinterest icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-more icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui shape">
                    <div class="sides">
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-more icon"></i>
                        </div>
                        <div class="active side">
                            <i class="huge flaticon-twitter icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-facebook icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-google icon"></i>
                        </div>
                        <div class="side">
                            <i class="huge flaticon-twitter icon"></i>
                        </div>
                    </div>
                </div>
            </div>
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
@endsection

@section('javascripts')
<script>
    $(document)
            .ready(function() {

                var
                        changeSides = function() {
                            $('.ui.shape')
                                    .eq(0)
                                    .shape('flip over')
                                    .end()
                                    .eq(1)
                                    .shape('flip over')
                                    .end()
                                    .eq(2)
                                    .shape('flip back')
                                    .end()
                                    .eq(3)
                                    .shape('flip back')
                                    .end()
                                    ;
                        },
                        validationRules = {
                            firstName: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter an e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Please enter a valid e-mail'
                                    }
                                ]
                            }
                        }
                ;

                $('.ui.dropdown')
                        .dropdown({
                            on: 'hover'
                        })
                        ;

                $('.ui.form')
                        .form(validationRules, {
                            on: 'blur'
                        })
                        ;

                $('.masthead .information')
                        .transition('scale in', 1000)
                        ;

                setInterval(changeSides, 3000);

            })
            ;
</script>
@endsection