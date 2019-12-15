<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Found & Lost</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Главная</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Контакты</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/adverts" class="brand-link">
            <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-rectangle">
        </a>

        <!-- Sidebar -->

        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            @auth()
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
        @endauth
        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Объявления
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ action('AdvertController@index') }}" class="nav-link">
                                    <i style="color:#00CCFF;" class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Все объявления</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ action('AdvertController@losts') }}" class="nav-link">
                                    <i style="color:#ff180e;" class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Потерии</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ action('AdvertController@finds') }}" class="nav-link ">
                                    <i style="color:#16ff36;" class="fas fa-angle-double-right nav-icon"></i>
                                    <p>Находки</p>
                                </a>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <a href="{{ route('myad')}}" class="nav-link">
                                        <i class="fas fa-user-edit nav-icon"></i>
                                        <p>Мои объявления</p>
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </li>


                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Категории
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('filter',['category' => 'Документы']) }}"
                                   class="nav-link">
                                    <i class="far fa-newspaper nav-icon"></i>
                                    <p>Документы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filter',['category' => 'Драгоценности']) }}"
                                   class="nav-link">
                                    <i class="far fa-gem nav-icon"></i>
                                    <p>Драгоценности</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filter',['category' => 'Животные']) }}"
                                   class="nav-link">
                                    <i class="fas fa-paw nav-icon"></i>
                                    <p>Животные</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filter',['category' => 'Транспорт']) }}"
                                   class="nav-link">
                                    <i class="fas fa-car-side nav-icon"></i>
                                    <p>Транспорт</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filter',['category' => 'Ключи']) }}"
                                   class="nav-link">
                                    <i class="fas fa-key nav-icon"></i>
                                    <p>Ключи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filter',['category' => 'Другое']) }}"
                                   class="nav-link">
                                    <i class="fab fa-artstation nav-icon"></i>
                                    <p>Другое</p>
                                </a>
                            </li>
                            <li  class="nav-item">
                                <a href="{{ route('filter',['category' => 'Люди']) }}" class="nav-link">
                                    <i class="fas fa-male nav-icon"></i>
                                    <p >Люди</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

@yield('content', 'Default Content')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Hackathon&copy; 2019 <a href="http://adminlte.io">TerraBytePRO</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.1
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('js/demo.js') }}"></script>

{{--<!-- PAGE PLUGINS -->--}}
{{--<!-- jQuery Mapael -->--}}
{{--<script src="{{ asset('jquery-mousewheel/jquery.mousewheel.js') }}"></script>--}}
{{--<script src="{{ asset('raphael/raphael.min.js') }}"></script>--}}
{{--<script src="{{ asset('jquery-mapael/jquery.mapael.min.js') }}"></script>--}}
{{--<script src="{{ asset('jquery-mapael/maps/usa_states.min.js') }}"></script>--}}
{{--<!-- ChartJS -->--}}
{{--<script src="{{ asset('chart.js/Chart.min.js') }}"></script>--}}

{{--<!-- PAGE SCRIPTS -->--}}
{{--<script src="{{ asset('js/pages/dashboard2.js') }}"></script>--}}
</body>
</html>
