<html>
    <head>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//cdn.jsdelivr.net/semantic-ui/2.1.4/semantic.min.js"></script>
    </head>
    <body>
        <div class="ui grid container">
            <div class="sixteen wide column">&nbsp;</div>
            <div class="ten wide column">
                <p><img src="{!! asset('image/' . $detProject->mainImage) !!}" class="ui center aligned container huge fluid image"></p>
                <p class="ui left aligned container">{!! $detProject->description !!}</p>
            </div>
            <div class="ui six wide column">
                <h1 class="ui left aligned container">{!! $detProject->title !!}</h1>
                <p class="ui left aligned">by {!! $detProject->createdBy !!}</p>
                <h2 class="ui left aligned"><i class="dollar icon">{{ number_format(15000, 0, ',', '.') }}</i></h2>
                <p class="ui left aligned">of <i class="dollar icon">{!! number_format($detProject->goal, 0, ',', '.') !!}</i></p>
                <div class="ui progress teal fluid" data-percent="(15000/{!! $detProject->goal !!})*100">
                    <div class="bar" style="transition-duration: 300ms; width: {!! 15000/$detProject->goal*100 !!}%;"></div>
                    <div class="label">{!! round(15000/$detProject->goal*100, 2) !!}% Funded</div>
                </div>
                <button class="ui blue massive button center fluid">Donate Now</button>
                <h2 class="ui left aligned">Share this on</h2>
                <button class="ui circular facebook icon button">
                    <i class="facebook icon"></i>
                </button>
                <button class="ui circular twitter icon button">
                    <i class="twitter icon"></i>
                </button>
                <a href="https://plus.google.com/share?url={{ /*$_SERVER['HTTP_HOST']*/ "www.google.com" . $_SERVER['REQUEST_URI'] }}" onclick="javascript:window.open(this.href,
            '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
    return false;">
                    <button class="ui circular google plus icon button">
                        <i class="google plus icon"></i>
                    </button>
                </a>
                <p>&nbsp;</p>
                <a href="/delete-project/{{$detProject->_id}}">
                    <button class="ui circular negative remove icon button">
                        <i class="remove icon"></i>
                        Delete Project
                    </button>
                </a>
            </div>
        </div>
        
        <div id="disqus_thread"></div>
    </body>
</html>
@section('javascripts')
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'blessingsupplychain';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
@endsection