<?php use Bono\Helper\URL; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bono Application')</title>

    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link type="image/x-icon" href="{{ Theme::base('/vendor/sleek-theme/img/favicon.ico') }}" rel="Shortcut icon" />

    <link rel="stylesheet" href="{{ Theme::base('/vendor/sleek-theme/css/naked.css') }}">
    <link rel="stylesheet" href="{{ Theme::base('/vendor/sleek-theme/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ Theme::base('/vendor/sleek-theme/js/fancybox/source/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ Theme::base('/vendor/sleek-theme/css/font/montserrat/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ Theme::base('/vendor/sleek-theme/css/font/open_sans/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ Theme::base('/vendor/sleek-theme/css/style.css') }}">

    <script type="text/javascript" charset="utf-8" src="{{ Theme::base('/vendor/sleek-theme/js/jquery.js') }}"></script>

    <!-- PAGE LEVEL STYLING -->
    @yield('styler')
    <!-- END OF PAGE LEVEL STYLING -->
</head>

<body class="blue">
    <!-- NAVBAR -->
    @section('navbar')
        @include('components.navbar')
    @show
    <!-- END OF NAVBAR -->

    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR -->
            @section('sidebar')
                @include('components.sidebar')
            @show

            @yield('content.wrapper', '<div class="span-10 main">')
                {{ f('notification.show') }}

                <!-- PAGE CONTENT -->
                @yield('content')
            </div>
        </div>
    </div>


    <!-- <div id="footer">
        <p>Copyright &copy; 2014
            <a href="http://xinix.co.id" target="blank">Xinix</a>. Some right(s) reserved.
        </p>
    </div> -->
    <script type="text/javascript" charset="utf-8" src="{{ Theme::base('/vendor/sleek-theme/js/underscore.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ Theme::base('/vendor/sleek-theme/js/main.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
    (function(){
        var URL_SITE = window.URL_SITE = '{{ URL::site() }}',
            URL_BASE = window.URL_BASE = '{{ URL::base() }}';}
    )();
    </script>

    <!-- PAGE LEVEL SCRIPT -->
    @yield('injector')
    <!-- END OF PAGE LEVEL SCRIPT -->
</body>
</html>
