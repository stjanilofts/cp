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
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/uikit.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/slideshow.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/slider.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/dotnav.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/notify.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/slidenav.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/tooltip.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/sticky.min.css" rel="stylesheet">
        <link href="/css/app.css" rel='stylesheet' type='text/css'>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/slideshow.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/slider.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/slideset.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/notify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/tooltip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/lightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/components/sticky.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>

        <script>
        Vue.config.debug = false;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        </script>
    </head>
    <body>

        <div class="haus">
            <div class="uk-grid uk-grid-collapse">
                <div class="uk-width-medium-1-3">
                    &nbsp;
                </div>
                <div class="uk-width-medium-1-3 uk-text-center">
                    <a href="/"><img src="/img/logo.png" /></a>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="cart-widget uk-float-right">
                        @include('frontend.cart.widget')
                    </div>
                </div>
            </div>
        </div>

        <div class="menu" data-uk-sticky>
            <nav class="top">
                {!! kalMenuExpandedAll() !!}
            </nav>
        </div>

        @if(isset($forsidumyndir) && !$forsidumyndir->isEmpty())
            <div class="uk-container uk-container-center collapse-small uk-margin-large-top">
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
            </div>
        @endif

        
        @if(!frontpage())
            <header>
                <h1>@yield('title')</h1>
            </header>

            <div class="content">
                @yield('content')
            </div>
        @endif

        <div class="footer">
            Hey
        </div>

        <script src="/js/scripts.js"></script>
    </body>
</html>
