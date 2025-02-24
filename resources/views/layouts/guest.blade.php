<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from travl.dexignlab.com/codeigniter/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Apr 2024 06:35:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Travl - CodeIgniter Hotel Admin Dashboard Bootstrap Template" />
    <meta property="og:title" content="Travl - CodeIgniter Hotel Admin Dashboard Bootstrap Template" />
    <meta property="og:description" content="Travl - CodeIgniter Hotel Admin Dashboard Bootstrap Template" />
    <meta property="og:image" content="../social-image.html" />
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Geo-Holidays') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        .text-center {

            text-align: center !important;
        }
    </style>
</head>

<body class="vh-100">
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

    @livewireScripts
</body>

</html>
