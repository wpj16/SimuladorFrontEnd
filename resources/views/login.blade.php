<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="76x76" href="https://www.tradetechnology.com.br/assets/img/trade.png">
        <link rel="icon" type="image/png" href="https://www.tradetechnology.com.br/assets/img/trade.png">
        <title>
            Material Dashboard 2 by Creative Tim
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
    </head>

    <body class="bg-gray-200">

        <main class="main-content  mt-0">
            <div class="page-header align-items-start min-vh-100"
                style="background-image: url('{{ asset('static/img/TradeTechnology/pes-com-chuteiras-disputando-por-bola-em-campo-de-futebol.jpg') }}');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container my-auto">
                    <div class="row">
                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1 row ">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="https://www.tradetechnology.com.br/assets/img/trade.png"
                                                width="80">
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <form role="form" class="text-start" action="{{ route('login.post') }}"
                                        method="POST">
                                        @csrf
                                        <div class="input-group input-group-outline focused is-focused my-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="josegustavo@tradetechnology.com.br"
                                                class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline focused is-focused mb-3">
                                            <label class="form-label">Senha</label>
                                            <input type="password" name="password" value="tradetechnology"
                                                autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember
                                                me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer position-absolute bottom-2 py-2 w-100">
                    <div class="container">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-12 col-md-6 my-auto">
                                <div class="copyright text-center text-sm text-white text-lg-start">
                                    © {{ date('Y') }}, Trade Technology
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
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
        <script type="text/javascript" src="{{ asset('static/js/core/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('static/js/core/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('static/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('static/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('static/js/material-dashboard.min.js?v=3.0.0') }}"></script>
        <script type="module" src="{{ asset('static/js/views/global.min.js') }}"></script>
    </body>

</html>
