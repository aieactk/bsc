@extends('layouts.master')
@section('content')
<div class="ui grid container">
    <div class="sixteen wide column">&nbsp;</div>
    <div class="ten wide column">
        <p><img src="{!! asset('upload/project/' . $detProject->mainImage) !!}" class="ui center aligned container huge fluid image"></p>
        <p class="ui left aligned container">{!! $detProject->description !!}</p>
    </div>
    <div class="ui six wide column">
        <h1 class="ui left aligned container">{!! $detProject->title !!}</h1>
        <p class="ui left aligned">by {!! $user->first_name . ' ' . $user->last_name !!}</p>
        <h2 class="ui left aligned"><i class="dollar icon">{{ number_format(15000, 2.00, ",", ".") }}</i></h2>
        <p class="ui left aligned">of <i class="dollar icon">{!! number_format($detProject->goal, 2.00, ",", ".") !!}</i></p>
        <div class="ui progress teal fluid" data-percent="(15000/{!! $detProject->goal !!})*100">
            <div class="bar" style="transition-duration: 300ms; width: {!! 15000/$detProject->goal*100 !!}%;"></div>
            <div class="label">{!! round(15000/$detProject->goal*100, 2) !!}% Funded</div>
        </div>
        <button class="ui blue massive button center fluid" id="donate_btn">Donate Now</button>
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
        @if(Auth::check() && $detProject->created_by === Auth::user()->_id)
        <a href="/delete-project/{{$detProject->_id}}">
            <button class="ui circular negative remove icon button" id="del-btn">
                <i class="remove icon"></i>
                Delete Project
            </button>
        </a>
        @endif
    </div>

    <div class="ui basic modal">
      <div class="header">
        Delete
      </div>
      <form action="#" method="post">
        <div class="content ui form">
          <div class="field">
            <p>Are you sure want to delete this project ?</p>
          </div>
        </div>
        <div class="actions">
          <div class="two fluid ui inverted buttons">
            <div class="ui red basic inverted button" id="no_btn1">
              <i class="remove icon"></i>
              No
            </div>
            <button class="ui green basic inverted button">
              <i class="checkmark icon"></i>
              Yes
            </button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </div>
      </form>
    </div>

    <div class="ui basic modal">
      <div class="header">
        Donation Amount
      </div>
      <form action="/donate" method="post">
        <div class="content ui form">
          <div class="field">
            <textarea name="description" placeholder="Description"></textarea>
          </div>
          <div class="field">
            <input type="number" name="amount" placeholder="Donation Amount">
          </div>
        </div>
        <div class="actions">
          <div class="two fluid ui inverted buttons">
            <div class="ui red basic inverted button" id="no_btn">
              <i class="remove icon"></i>
              No
            </div>
            <button class="ui green basic inverted button">
              <i class="checkmark icon"></i>
              Yes
            </button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </div>
      </form>
    </div>

    <div id="disqus_thread" class="sixteen wide column"></div>
</div>
@endsection
@section('javascripts')
    @parent
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'blessingsupplychain';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();

        $('#donate_btn').click(function(){
          $('.ui.basic.modal').modal('show')});

        $('#no_btn').click(function(){
          $('.ui.basic.modal').modal('hide')
        });

        $('#yes_button').click(function(){
          $.ajax({
            url: '/donate',
            type: "post",
            data: {'desc': $('input[name=description]').val(), 'val': $('input[name=amount]').val(), '_token': $('input[name=_token]').val()},
            success: function(data){
              alert(data);
            }
          })
        });
    </script>
@endsection
