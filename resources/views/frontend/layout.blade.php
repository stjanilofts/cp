<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ config('formable.site_title') }}{{ isset($pagetitle) ? ' | '.$pagetitle : '' }}</title>

        <meta name="description" content="">
        <meta name="keywords" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        
        <link href="{{ elixir('css/custom.css') }}" rel='stylesheet' type='text/css'>
        <script src="{{ elixir('js/top.js') }}"></script>

        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Josefin+Sans:400,600,300|Lato:700,400,300' rel='stylesheet' type='text/css'>

        <script>
        Vue.config.debug = false;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        </script>
    </head>
    <body>
        <div class="mainwrap">
            <div class="haus">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3 uk-hidden-small">
                        &nbsp;
                    </div>
                    <div class="uk-width-medium-1-3 uk-text-center">
                        <a href="/"><img src="/img/logo2.png" /></a>
                    </div>
                    <div class="uk-width-medium-1-3 cart-widget-container uk-flex uk-flex-center uk-text-center uk-flex-middle">
                        @include('frontend.cart.widget')
                    </div>
                </div>
            </div>






            <div class="menu normal">
                <nav class="top">
                    {!! kalMenuExpandedAll(['hidesmall' => true]) !!}
                    <div>
                        <a href="#my-id" data-uk-offcanvas><i class="uk-icon-bars uk-margin-right"></i>Sjá meira</a>
                    </div>
                </nav>
            </div>


            {{-- @if(frontpage())
                @if(isset($forsidumyndir) && !$forsidumyndir->isEmpty())
                    <div class="forsidumyndir">
                        <div class="uk-slidenav-position" data-uk-slideshow="{autoplay: true, autoplayInterval: 3000">
                            <ul class="uk-slideshow">
                                @foreach($forsidumyndir as $key => $mynd)
                                    <li>
                                        <div class="forsidumynd" style="background-image: url('/imagecache/banner/{{ $mynd->img()->first() }}');">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                        </div>
                    </div>
                @endif
            @endif --}}

            



            @if(!frontpage())
                <div class="content-container" style="padding-bottom: 80px !important;">
                    <header>
                        <h1>@yield('title')</h1>
                    </header>

                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            @endif



            <div class="footer uk-flex uk-flex-middle uk-flex-center uk-flex-wrap">
                <span>&copy; Crystal Peel 2016&nbsp;|&nbsp;Dalvegur 28&nbsp;|&nbsp;895-0575 / 571-6990&nbsp;|&nbsp;Vsk nr. 78069&nbsp;|&nbsp;</span><a href="mailto:crystalpeel@crystalpeel.is">crystalpeel@crystalpeel.is</a>
            </div>
        </div>



        <div id="my-id" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <nav class="offcanvas">
                    {!! kalMenuExpandedAll() !!}
                </nav>
            </div>
        </div>


        <script src="{{ elixir('js/custom.js') }}"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '{{ env('GA') }}', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
