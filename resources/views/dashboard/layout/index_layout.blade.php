<?php

use App\Models\UsuarioFoto;

?>

<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('titulo') </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template_themekit/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_themekit/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_themekit/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_themekit/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_themekit/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('template_themekit/dist/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template_themekit/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">

    {{-- css das pagina  --}}
    @yield('css')
    @yield('responsivel')
    {{-- fim do css das pagina  --}}
</head>

<body>


    <div class="wrapper">

        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>

                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>

                    </div>

                    <div class="top-menu d-flex align-items-center">


                        <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>

                        <div class="dropdown">
                            @php
                                $id = $_SESSION['id'];
                                $usuario = UsuarioFoto::find($id);

                            @endphp

                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{asset('storage/'.$usuario->foto_caminho)}}" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                <a class="dropdown-item" href="{{ route('logout.destroy') }}"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>



        <div class="page-wrap">

            <div class="app-sidebar colored">

                {{-- barra lateral logo --}}
                <div class="sidebar-header">
                    <a class="header-brand" href="index.html">
                        <div class="logo-img">
                           <img src="{{asset('template_themekit/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text">ThemeKit</span>
                    </a>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>
                {{-- barra lateral logo fim --}}

                {{-- barra lateral conteudo  --}}
                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-lavel">Navigation</div>
                            <div class="nav-item active">
                                <a href="{{ route('usuario.index')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            <div class="nav-item">
                                <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                            </div>

                        </nav>
                    </div>
                </div>
                 {{-- barra lateral conteudo FIM  --}}
            </div>

            <div class="main-content">
                <div class="container-fluid">

                    @yield('listaUsuario')
                    @yield('CreateUsuario')
                    @yield('EditarUsuario')

                </div>
            </div>



            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Desenvolvimento de teste</span>
                    <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Feito com <i class="fa fa-heart text-danger"></i> e <a href="http://lavalite.org/" class="text-dark" target="_blank">Carinho</a></span>
                </div>
            </footer>

        </div>


    </div>




    <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel"
        aria-hidden="true" data-backdrop="false">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                class="ik ik-x-circle"></i></button>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="quick-search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="input-wrap">
                                    <input type="text" id="quick-search" class="form-control"
                                        placeholder="Search..." />
                                    <i class="ik ik-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="container">
                        <div class="apps-wrap">
                            <div class="app-item">
                                <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>

                            <div class="app-item">
                                <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- essa primeira instrucao e o jquery 1 tem que te internet  , o 2 e local
        {{--1} <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}
        {{--2 --}}<script src="{{ asset('template_themekit/src/js/vendor/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('template_themekit/plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
    <script src="{{ asset('template_themekit/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('template_themekit/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template_themekit/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template_themekit/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template_themekit/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset('template_themekit/dist/js/theme.min.js') }}"></script>
    <script src="{{ asset('template_themekit/js/alerts.js')}}"></script>


</body>

</html>
