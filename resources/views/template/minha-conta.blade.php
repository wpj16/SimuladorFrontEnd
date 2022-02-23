<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="https://www.tradetechnology.com.br/assets/img/trade.png">
        <link rel="icon" type="image/png" href="https://www.tradetechnology.com.br/assets/img/trade.png">
        <title>
            {{ config('app.name') }}
        </title>
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="{{ asset('static/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('static/css/nucleo-svg.css') }}" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="{{ asset('static/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('static/css/custom-trade.css') }}" />
        <link rel="stylesheet" href="{{ asset('static/css/alert-html.min.css') }}" />
        @yield('include-css')
    </head>

    <body class="g-sidenav-show  bg-gray-200"
        style="background-image: url('{{ asset('static/img/TradeTechnology/pes-com-chuteiras-disputando-por-bola-em-campo-de-futebol.jpg') }}');background-size: 100%;">
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0 d-flex justify-content-center"
                    href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                    <img src="https://www.tradetechnology.com.br/assets/img/trade.png" class="navbar-brand-img h-100"
                        alt="main_logo">
                </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white  @yield('menu-campeonato-simulado')"
                            href="{{ route('minha.conta.campeonato.listar.simulacoes.get') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Simulações</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @yield('menu-cadastrar-time')"
                            href="{{ route('minha.conta.cadastrar.time.get') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">assignment</i>
                            </div>
                            <span class="nav-link-text ms-1">Cadastrar Time</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @yield('menu-cadastrar-jogador')"
                            href="{{ route('minha.conta.cadastrar.jogadores.get') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <span class="nav-link-text ms-1">Cadastrar jogadores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @yield('menu-cadastrar-campeonato')"
                            href="{{ route('minha.conta.cadastrar.campeonato.get') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">table_view</i>
                            </div>
                            <span class="nav-link-text ms-1">Cadastrar Campeonato</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm"><a class="text-white" href="javascript:;">Menu
                                    Campeonato</a></li>
                            <li class="breadcrumb-item text-sm text-white active font-weight-bolder"
                                aria-current="page">@yield('menu-breadcrumb')
                            </li>
                        </ol>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end"
                        id="navbar">

                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center m-2">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center m-2">
                                <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">{{ session('cliente.usuario.pessoa.nome') }}</span>
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center m-2">
                                <a href="{{ route('login.get') }}" class="nav-link text-body font-weight-bold px-0">
                                    <i class="material-icons opacity-10 mt-2">login</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            @yield('content')
        </main>
        <!--========================================================================================================================================== -->
        @if (session()->has('success') || $errors->any())

        <alert-html class="col-12">
            <!-- Alert Success Backend -->
            @if (session()->has('success'))
            <alert-html-item class="alert-html-success" backend="true">
                <alert-html-menssage>
                    @foreach (session('success',[]) as $success)
                    <span>{{ is_array($success) ? current($success) : $success }}<br></span>
                    @endforeach
                </alert-html-menssage>
                <alert-html-close tabindex="0" role="button">X</alert-html-close>
            </alert-html-item>
            @endif
            <!-- Alert Error Backend -->
            @if ( $errors->any())
            <alert-html-item class="alert-html-danger" backend="true">
                <alert-html-menssage>
                    @foreach ($errors->all() as $error)
                    <span>{{ is_array($error) ? current($error) : $error }}<br></span>
                    @endforeach
                </alert-html-menssage>
                <alert-html-close tabindex="0" role="button">X</alert-html-close>
            </alert-html-item>
            @endif
        </alert-html>
        @endif
        <!--========================================================================================================================================== -->
        <!--   Core JS Files   -->
        <script type="text/javascript" src="{{ asset('static/js/jquery/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('static/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('static/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('static/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('static/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('static/js/material-dashboard.min.js?v=3.0.0') }}"></script>
        <script type="module" src="{{ asset('static/js/views/global.min.js') }}"></script>
        @yield('include-js')
    </body>

</html>
