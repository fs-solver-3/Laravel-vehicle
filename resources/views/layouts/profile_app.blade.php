<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/main.css')}}" />
    @yield('add_css')
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}" />
    <script src="{{asset('static/js/jquery.min.js')}}"></script>
    <script>
        window.Laravel = {!!json_encode(['csrfToken' => csrf_token()
                , 'user' => ['authenticated' => auth() -> check()
                    , 'id' => auth() -> check() ? auth() -> user() -> id : null
                    , 'name' => auth() -> check() ? auth() -> user() -> name : null
                    , 'avatar' => auth() -> check() ? auth() -> user() -> avatar : null
                , ]
            ]) !!};
    </script>

    <script type="text/javascript">
        if (window.location.hash === "#_=_"){

            // Check if the browser supports history.replaceState.
            if (history.replaceState) {

                // Keep the exact URL up to the hash.
                var cleanHref = window.location.href.split("#")[0];

                // Replace the URL in the address bar without messing with the back button.
                history.replaceState(null, null, cleanHref);

            } else {

                // Well, you're on an old browser, we can get rid of the _=_ but not the #.
                window.location.hash = "";

            }

        }
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(67411513, "init", {
            clickmap: true
            , trackLinks: true
            , accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/67411513" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178203193-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-178203193-1');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime()
                , event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0]
                , j = d.createElement(s)
                , dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MF3CHBC');
    </script>
    <!-- End Google Tag Manager -->

    <!-- /Yandex.Metrika counter -->

     {{-- {!! Helper::setting('google_code') !!}
     {!! Helper::setting('google_tag_code') !!} --}}


    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>
<body class="index-page @if(Route::currentRouteName()=='personal-message' )  other-page mobile-flow @endif"  >
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MF3CHBC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        @include('layouts.profile_header')
        @yield('content')
        @include('layouts.mobile_footer')
        @include('layouts.footer')
        @include('layouts.scripts')
        @include('layouts.modal')
    </div>
</body>