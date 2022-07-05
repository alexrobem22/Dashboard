<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('template_themekit/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template_themekit/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template_themekit/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template_themekit/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template_themekit/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('template_themekit/dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template_themekit/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">

    </head>

    <body>


        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('template_themekit/img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">

                        <div class="authentication-form mx-auto" style="padding: 0 !important;">

                            <div class="logo-centered">
                                <a href="../index.html"><img src="{{ asset('template_themekit/src/img/brand.svg')}}" alt="imagem"></a>
                            </div>


                            <input type="hidden" id="login_senha" class="btn btn-primary btn-sm" onclick="login_senha('mid-center')">
                            <input type="hidden" id="logar" class="btn btn-primary btn-sm" onclick="logar('mid-center')">

                           @php

                           if (isset($erro) && $erro != ''){
                            $script = "<script> var variavel = '$erro'; </script>";
                                echo $script;
                           }

                           @endphp

                            {{-- <h3>Entrar no Dashabord</h3> --}}
                            <p>Feliz em vê-lo novamente!</p>

                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                    <i class="ik ik-user"></i>
                                    <div style="color: red;">
                                     {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </div>
                                </div>


                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" name="senha"  value="{{old('senha')}}">
                                    <i class="ik ik-lock"></i>
                                    <div style="color: red;">
                                     {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Me lembre</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html">Recuperar Senha ?</a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Entrar</button>
                                </div>
                            </form>

                            <div class="register">
                                <p>Não tem uma conta ? <a href="register.html">Crie a sua conta aqui</a></p>
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
    <script src="{{ asset('template_themekit/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template_themekit/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template_themekit/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset('template_themekit/dist/js/theme.min.js') }}"></script>
    <script src="{{ asset('template_themekit/js/alerts.js')}}"></script>





    </body>
</html>
