<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


    <!-- Main application style  -->

    <link rel="stylesheet" href="{{ elixir('css/frontend.css', 'themes/default/assets/build') }}">

    <!-- Inject any optional Page styles Below -->

    @yield('page_styles')

</head>
<body itemscope itemtype="http://schema.org/WebPage">
    <div class="mdl-layout__container @yield('bg')" ng-controller="MainController">
        <div class="demo-layout-waterfall mdl-layout mdl-js-layout">
