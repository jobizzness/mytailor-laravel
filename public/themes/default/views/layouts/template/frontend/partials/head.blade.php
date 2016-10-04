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

    <style type="text/css">
        {{ file_get_contents(theme('vendor/material-design-lite/material.min.css')) }}
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {display: none !important;}
    </style>
    <link rel="shortcut icon" href="{{ theme('images/favicon.png')}}">
    <link rel="stylesheet" href="{{ elixir('css/frontend.css', 'themes/default/assets/build') }}">
        @yield('page_styles')
<body itemscope itemtype="http://schema.org/WebPage">
  <div class="mt-layout @yield('bg')" ng-controller="MainController">