<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DD') }}</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>
    <!-- toastr-->
    <link href="{{ asset('css/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />

    <!--Importar archivos-->
    <link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!--        Fontawesome-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <!--        nprogress-->
    <link rel="stylesheet" href="{{ asset('css/nprogress.css')}}">
    <!--        datatables-->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/extra.css')}}">

    @yield('styles')

    <style>
        .xxx{
            display: none;
        }
        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }
        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 } 
            to { bottom:0px; opacity:1 }
        }
        @keyframes animatebottom { 
            from{ bottom:-100px; opacity:0 } 
            to{ bottom:0; opacity:1 }
        }

        .nav_sede{
            font-size: 13px;
            padding-right: 15px;
            color: gray;
        }
    </style>


    <script>
        window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
          ]) !!};
      </script>

  </head>
  <body class="loaded" onload="myFunction()" >

    <div id="loader" class="preloader-wrapper big active" style="left: 45%; top: 40%; position: absolute; background: #fff;">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
        <div class="circle"></div>
    </div>
</div>
</div>

<header class="xxx">
    <div class="navbar-fixed">
        <nav class="grey darken-3" role="navigation">
            <div class="nav-wrapper ">
                <ul class="left">
                    <li>
                        <h1 class="logo-wraper" style="margin:0;font-size:1rem">
                            <a style="margin:1px 0;padding:14px 20px" id="logo-container" href="{{ route('inicio') }}" class="brand-logo">
                                <img style="width:172px" src="{{ asset('images/inicio.png')}}" alt="Inicio">
                            </a>
                        </h1>

                    </li>
                </ul>



                <ul class="right hide-on-med-and-down">
                    <li class="nav_sede"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i> {{session('sede_nombre')}}</li>

                    <!--   roles del superusuario-->
                    @if(in_array("Super", session('roles')))
                    <li><a href="{{ route('local.index') }}">Sedes</a></li>
                    <li><a href="{{ route('admin.index') }}">Administradores</a></li>
                    @endif

                    <!--   roles del administrador del gimnasio-->
                    @if(in_array("Administrador", session('roles')))
                    <li><a href="{{ route('trainer.index') }}">Entrenadores</a></li>
                    @endif

                    @if(in_array("Trainer", session('roles')) || in_array("Administrador", session('roles')))
                    <li><a href="{{ route('client.index') }}">Clientes</a></li>
                    @endif

                    <!--   roles del Entrenador de gimnasio    -->
                    @if(in_array("Trainer", session('roles')))                          
                    <li><a href="#">Ejercicios</a></li>
                    @endif

                    @if (!Auth::guest())
                    <li><a class="dropdown-button" href="#!" data-activates="salir">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>

                    <ul id="salir" class="xxx dropdown-content">

                        <li><a href=""><i class="fa fa-user fa-lg" aria-hidden="true"></i> Mi cuenta</a></li>
                        <li class="divider"></li>
                        <li><a href="/inicio_sedes"><i class="fa fa-lg fa-arrow-left" aria-hidden="true"></i> Sedes</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>

                    @endif

                </ul>

                <!--                        boton de menu-->
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>
</header>

<main id="main" class="xxx animate-bottom">
    <ul id="slide-out" class="side-nav">
        <li>
            <div class="userView">
                <div class="background">
                    <img src="{{ asset('images/logo.png')}}">
                </div>
                <a href="#!user"><img class="circle" src="{{ asset('images/perfil.jpg')}}"></a>
                <a href="#!name"><span class="white-text name">{{session('name')}}</span></a>
                <a href="#!name"><span class="white-text name">{{session('sede_nombre')}}</span></a>
                <a href="#!email"><span class="white-text email">{{session('rol_nombre')}}</span></a>
            </div>
        </li>
        <li><a href="{{ route('client.index') }}"><i class="material-icons">group</i> Clientes</a></li>
        <li class="active"><a href="{{ route('local.index') }}"><i class="material-icons">location_city</i> Sedes</a></li>

        <li class="dropdown">
            <a class="ripple-effect dropdown-toggle" data-toggle="dropdown" href="#"><i class="material-icons">settings</i> Configuración <b class="caret"></b></a>
            <ul class="dropdown-menu"> 

                <li class=""><a href="{{ route('local.index') }}"><i class="material-icons">location_city</i> Sedes</a></li>

            </ul>

        </li>

        <li><a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" ><i class="material-icons">exit_to_app</i> Cerrar sesión</a></li>

        </ul>
        <!--                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>-->



        <div class="container">
            @yield('content')


        </div>

    </main>

    <footer class="xxx page-footer black" style="padding-top:0">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2017 Todos los derechos reservados
                <span class="right">
                    Made by <a class="grey-text text-lighten-3" href="http://materializecss.com">Piereyed</a>
                </span>
            </div>
        </div>
    </footer>

    <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('js/materialize.js')}}"></script>        
    <script src="{{ URL::asset('js/validate/jquery.validate.min.js')}}"></script>
    <script src="{{ URL::asset('js/validate/additional-methods.min.js')}}"></script>
    <!--  toastr-->
    <script src="{{ asset('js/toastr/toastr.min.js')}}"></script>
    <!-- nprogress-->
    <script src="{{ URL::asset('js/nprogress.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <!-- custom-->
    <script src="{{ URL::asset('js/init.js')}}"></script>

    @yield('scripts')

    <script>
        var myVar;
        function myFunction() {
            myVar = setTimeout(showPage, 500);
        }
        function showPage() {
            $("#loader").hide();
            $(".xxx").show();
        }
    </script>

    <script type="text/javascript">
            //Code for show success  messages            
            @if( @Session::has('success') )
            toastr.success('{{ @Session::get('success') }}');
            @endif
        </script>
        <script type="text/javascript">
            //Code for show warning  messages
            @if( @Session::has('warning') )
            toastr.warning('{{ @Session::get('warning') }}');
            @endif
        </script>
        <script type="text/javascript">
            //Code for show back error messages
            @if (@Session::has('errors'))
            @foreach ($errors->all() as $error)
            toastr.error('{{ @$error }}');
            @endforeach
            @endif
        </script>
    </body>
    </html>