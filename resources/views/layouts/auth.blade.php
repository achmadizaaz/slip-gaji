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
        <!-- Button Mode Color / Dark Mode -->
        <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
            <button class="btn btn-sm btn-primary  dropdown-toggle d-flex align-items-center gap-1" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (dark)">
                <span class="bi my-1 theme-icon-active">
                    <i class="theme-change-icon"></i>
                </span>
                <i class="bi bi-caret-down-fill"></i>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <i class="bi bi-sun-fill me-2"></i>
                    Light
                    <span class="bi ms-auto d-none" width="1em" height="1em"><a href="#check2"><i class="bi bi-check"></i></a></span>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="dark" aria-pressed="true">
                    <i class="bi bi-moon-stars-fill me-2"></i>
                    Dark
                    <span class="bi ms-auto d-none" width="1em" height="1em"><a href="#check2"><i class="bi bi-check"></i></a></span>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                    <i class="bi bi-circle-half me-2"></i>
                    Auto
                    <span class="bi ms-auto d-none" width="1em" height="1em"><a href="#check2"><i class="bi bi-check"></i></a></span>
                </button>
            </li>
            </ul>
        </div>
        <!-- END Button Mode Color / Dark Mode -->
    </body>
    <!--end body-->
</html>