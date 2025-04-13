<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="#" class="logo">
            <span>
                <img src="{{ asset('themes/images/logo-laravel.webp') }}" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="{{ asset('themes/images/laravel.webp') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('themes/images/laravel.webp') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    
    <!--start startbar-menu-->
    <div class="startbar-menu" >
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li><!--end nav-item-->

                    <li class="menu-label mt-2">
                        <span>User Management</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAnalytics"> 
                            <i class="iconoir-community menu-icon"></i>                                     
                            <span>Pengguna</span>
                        </a>
                        <div class="collapse " id="sidebarAnalytics">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="analytics-customers.html" class="nav-link ">List Pengguna</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a href="analytics-reports.html" class="nav-link ">Roles</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a href="analytics-reports.html" class="nav-link ">Hak Akses</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div>
                    </li><!--end nav-item-->   

                    <li class="menu-label mt-2">
                        <span>Settings</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-gear menu-icon"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li><!--end nav-item-->
                    
                </ul><!--end navbar-nav--->
            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->    
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>
<!-- end leftbar-tab-menu-->