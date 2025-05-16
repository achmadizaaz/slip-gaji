<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="dark">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', env('APP_NAME'))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('themes/images/logo-laravel.webp') }}">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- App css -->
        <link href="{{ asset('themes/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    </head>

    
    <!-- Top Bar Start -->
    <body>
        @include('layouts.topbar')

        @include('layouts.leftbar')

        @yield('content')

        <!-- Javascript  -->  
        <!-- vendor js -->
        
        <script src="{{ asset('themes/vendor/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('themes/js/app.js') }}"></script>

        @stack('scripts')
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        </script>

    </body>
    <!--end body-->
</html>