<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>{{ config('app.name', 'CRM pro') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/morris/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="deshboard-1">

                        @guest
                            @yield('content')
                        @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                            <div class="main-wrapper">
                                <div class="header">
                                    <div class="header-left">
                                        <a href="index.html" class="logo">
                                            <img src="assets/img/logo.png" width="40" height="40" alt="">
                                        </a>
                                    </div>
                                    <div class="page-title-box pull-left">
                                        <h3>CRM Pro</h3>
                                    </div>
                                    <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars"
                                            aria-hidden="true"></i></a>
                                    <ul class="nav navbar-nav navbar-right user-menu pull-right">
                                        <li class="dropdown hidden-xs">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span
                                                    class="badge bg-purple pull-right">3</span></a>
                                            <div class="dropdown-menu notifications">
                                             
                                             
                                                
                                            </div>
                                        </li>
                                        <li class="dropdown hidden-xs">
                                            <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i>
                                                <span class="badge bg-purple pull-right">8</span></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                                                <span class="user-img"><img class="img-circle" src="assets/img/user.jpg" width="40" alt="Admin">
                                                    <span class="status online"></span></span>
                                                <span>Admin</span>
                                                <i class="caret"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="profile.html">My Profile</a></li>
                                                <li><a href="edit-profile.html">Edit Profile</a></li>
                                                <li><a href="settings.html">Settings</a></li>
                                                <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="dropdown mobile-user-menu pull-right">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="profile.html">My Profile</a></li>
                                            <li><a href="edit-profile.html">Edit Profile</a></li>
                                            <li><a href="settings.html">Settings</a></li>
                                            <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar" id="sidebar">
                                    <div class="sidebar-inner slimscroll">
                                        <div id="sidebar-menu" class="sidebar-menu">
                                            <ul>
                                                <li class="active">
                                                    <a href="{{ route('home') }}">Dashboard</a>
                                                </li>
                                                
                                                <li>
                                                    <a href="{{ route('client') }}">Clients</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('employee') }}">Employees</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @yield('content')
                            </div>
                            <div class="sidebar-overlay" data-reff="#sidebar"></div>

                        @endguest



    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>		


</body>
</html>
