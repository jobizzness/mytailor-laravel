<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <title>@yield('pagetitle') | MyTailor African Fashion designers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ theme('images/favicon.png')}}">
    <!-- Material Design style -->
    <link rel="stylesheet" href="{{ theme('vendor/material-design-lite/material.min.css')}}">
    <link rel="stylesheet" href="{{ theme('css/admin.css')}}">
    <link rel="stylesheet" href="{{ theme('css/animate.css')}}">
s
    <script src="{{ theme('js/vendor.js') }}"></script>
</head>
<body>
        <div class="mt-layout-container mt-layout @yield('bg')" ng-controller="MainController">