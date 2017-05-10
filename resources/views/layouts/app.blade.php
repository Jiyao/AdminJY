<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}-@yield('title')</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/flat-admin.css') }}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/blue-sky.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/yellow.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/common.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="app app-default">
        @include('layouts._left')
        <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
            <div class="dropdown-background">
                <div class="bg"></div>
            </div>
            <div class="dropdown-container">
            </div>
        </script>
        <div class="app-container">
            @include('layouts._top')
            <div class="row">
                @yield('content')
            </div>
            <footer class="app-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="footer-copyright">
                            Copyright © 2016 Company Co,Ltd.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="assets/js/vendor.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>
