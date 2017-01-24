<!DOCTYPE html>
<html>
    <head>
        <title>@yield('pagetitle') – Afrodapp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->
    <link rel="manifest" href="/manifest.json">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="MyTailor">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#ff4081">
    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16">

    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <meta name="msapplication-config" content="/images/browserconfig.xml">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="#e1e1e1">
    <!-- Seo Generate -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <!-- Favicon For Browsers -->

    <link rel="shortcut icon" href="{{ theme('images/favicon.png')}}">

    <!-- CSRF Token is stored here for refrence -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Material Design Lite page styles-->

    <link rel="stylesheet" href="{{theme('vendor/material-design-lite/material.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{theme('css/auth.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Amaranth:400i,700i" rel="stylesheet">
    {{-- Roboto Font here --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <div class="mdl-layout__container">
            @yield('main')
        </div>
    </body>

    <!-- Google Analytics should never be commented no matter what -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-56825866-2', 'auto');
      ga('send', 'pageview');
    </script>
    <script src="{{ theme('vendor/material-design-lite/material.min.js')}}"></script>
</html>
