<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="auto">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', env('APP_NAME'))</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- App css -->
        <link href="{{ asset('themes/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Scripts Dark Mode Bootstrap -->
        <script src="{{ asset('js/dark-mode.js') }}"></script>


    </head>

    
    <!-- Top Bar Start -->
    <body>
         @yield('content')
    </body>
    <!--end body-->
</html>