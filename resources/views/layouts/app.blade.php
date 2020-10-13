<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">

    <!--fonts and icons-->
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/unicode-fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/english-fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
    <!--css files-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <!-- for datatable -->
    <link rel="stylesheet" href="{{asset('css/material.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-table-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.material.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/dashboard-style.css')}}">

    @yield('title')

    @yield('style')

</head>
<body>
    <div class="wrapper">
        
        <!--top navbar-->
        <div class="top-navbar">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand text-uppercase font-weight-bold" href="#">සුරකිමු දරුවන්</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-home"></i>
                                    <span class="text-uppercase">මුල් පිටුවට</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ඔබේ ගිණුම
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-uppercase" href="/midwife/password-change">
                                        <i class="fas fa-key"></i>
                                        මුරපදය වෙනස් කරන්න
                                    </a>
                                    <a class="dropdown-item text-uppercase" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        නික්මෙන්න
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>                    
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body">

            @if (Auth::user()->role_id=='0')
                @include('layouts.sidebars.admin')
            @elseif (Auth::user()->role_id=='1')
                @include('layouts.sidebars.doctor')
            @elseif (Auth::user()->role_id=='2')
                @include('layouts.sidebars.sister')
            @elseif (Auth::user()->role_id=='3')
                @include('layouts.sidebars.midwife')
            @elseif (Auth::user()->role_id=='4')
                @yield('sidebar')
            @endif

            <!-- content -->
            @yield('content')
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

    </div>

    <script type="text/javascript" src="{{asset('js/core/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/core/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <!-- for data table -->
    <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom-table-script.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dataTables.material.min.js')}}"></script>

    @yield('script')

    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active");
            });
            
            $(".mob-hamburger").click(function() {
                $(".wrapper").toggleClass("mob-active");
            });
        });
    </script>

</body>
</html>
