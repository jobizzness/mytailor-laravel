<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Seo Generate --}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ theme('images/favicon.png')}}">
    <!-- Material Design style -->
    <link rel="stylesheet" href="{{ theme('vendor/material-design-lite/material.min.css')}}">
    <link rel="stylesheet" href="{{ theme('css/frontend.css')}}">
    <link rel="stylesheet" href="{{ theme('css/animate.css')}}">
    <!-- Ng-Dialog -->
    <link rel="stylesheet" href="{{ theme('css/vendor/ng-dialog/ngDialog.min.css') }}">
    <!-- Instant search -->
    <link rel="stylesheet" type="text/css" href="{{ theme('vendor/instantsearch.js/dist/instantsearch.min.css') }}">
    {{-- ScrollBar --}}
    <link rel="stylesheet" href="{{ theme('css/vendor/jquery.mCustomScrollbar.min.css')}}">
    {{-- Additional page styles --}}
    @yield('page_styles')
    <script src="{{ theme('js/vendor.js') }}"></script>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
  <div class="mt-layout @yield('bg')" ng-controller="MainController">