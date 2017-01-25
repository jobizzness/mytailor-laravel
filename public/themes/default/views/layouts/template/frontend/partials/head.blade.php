<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
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

    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="#e1e1e1">

    {{--  Redirect To Mobile If Window size is less then 770 --}}
    <script type="text/javascript">
        if(window.innerWidth < 770){
            window.location = "https://afrodapp-623d4.firebaseapp.com" + window.location.pathname;
        }
    </script>

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

    {{-- Roboto Font here --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Main application style  -->

    <link rel="stylesheet" href="{{ elixir('css/frontend.css', 'themes/default/assets/build') }}">

    <!-- Inject any optional Page styles Below -->

    @yield('page_styles')

    <style type="text/css">
    [ng-cloak]{
        display: none;
        opacity: 0;
    }
    </style>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
    <div class="mdl-layout__container @yield('bg')" ng-controller="MainController">
        <div class="demo-layout-waterfall mdl-layout mdl-js-layout">
