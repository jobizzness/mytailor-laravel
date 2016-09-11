<!DOCTYPE html>
<html>
    <head>
        <title>@yield('pagetitle') | MyTailor Africa</title>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ theme('images/favicon.png')}}">
    <!-- Material Design style -->
    <link rel="stylesheet" href="{{ theme('vendor/material-design-lite/material.min.css')}}">
    <!-- Site style -->
    <link rel="stylesheet" href="{{ theme('css/admin.css')}}">
    <!-- vendor styles -->
    <link rel="stylesheet" href="{{ theme('css/animate.css')}}">
    </head>
    <body>
        <div class="mt-layout grey60">
            <div class="mt-page-wrapper">
                <div class="mt-layout-content">
                    @yield('main')
                </div>
            </div>
        </div>
    </body>



</html>
