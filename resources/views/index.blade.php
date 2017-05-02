<!DOCTYPE html>
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
    <!--        dropify-->
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css')}}">

    <!--    favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/fav/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/fav/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/fav/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/fav/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/fav/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/fav/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/fav/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/fav/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/fav/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/fav/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('images/fav/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
            color: #dcdcdc;
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
        <nav class="grey darken-2" role="navigation">
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
                    <li><a href="{{ route('trainer.index') }}"><i class="material-icons left">group</i>Entrenadores</a></li>
                    @endif

                    @if(in_array("Administrador", session('roles')))
                    <li><a href="{{ route('client.index') }}"><i class="material-icons left">wc</i>Clientes</a></li>
                    @endif

                    <!--   roles del Entrenador de gimnasio    -->
                    @if(in_array("Entrenador", session('roles')))
                    <li><a href="{{ route('myathletes.index') }}"><i class="material-icons left">directions_run</i>Mis atletas</a></li>
                    @endif

                    @if(in_array("Entrenador", session('roles')))     
                    <li><a class="dropdown-button" href="#!" data-activates="parametros"><i class="material-icons left">settings</i>Parámetros<i class="material-icons right">arrow_drop_down</i></a></li>

                    <ul id="parametros" class="dropdown-content">
                        <li><a href="{{ route('exercise.index') }}"><i class="material-icons left">fitness_center</i>Ejercicios</a></li>
                        <!-- <li><a href="{{ route('muscle.index') }}"><i class="material-icons left">accessibility</i>Músculos</a></li> -->
                        <!-- <li><a href="{{ route('goal.index') }}"><i class="material-icons left">gps_fixed</i>Objetivos</a></li> -->
                        <li><a href="{{ route('microcycle.index') }}"><i class="material-icons left">autorenew</i>Microciclos</a></li>
                        <li><a href="{{ route('pyramid.create') }}"><i class="material-icons left">change_history</i>Pirámides</a></li>
                    </ul>

                    @endif

                    <!--   roles del Cliente de gimnasio    -->
                    @if(in_array("Cliente", session('roles')))
                    <li><a href="{{ route('myroutines.index') }}"><i class="material-icons left">directions_run</i>Entrenar</a></li>
                    @endif

                    <!-- nombre -->
                    @if (!Auth::guest())
                    <li><a class="dropdown-button" href="#!" data-activates="salir">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>

                    <ul id="salir" class="dropdown-content">

                        <li><a href=""><i class="material-icons left">perm_identity</i>Mi cuenta</a></li>
                        <li class="divider"></li>
                        <li><a href="/"><i class="material-icons left">business</i>Sedes</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" ><i class="left material-icons">power_settings_new</i> Salir</a>
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
                <a href="#!user"><img class="circle" title="Foto perfil" src="{{ asset('storage/'.session('photo'))  }}"></a>
                <a href="#!name"><span class="white-text name">{{session('name')}}</span></a>                
                <a href="#!email"><span class="white-text email">{{session('rol_nombre')}} - {{session('sede_nombre')}}</span></a>
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

    <footer class="xxx page-footer grey darken-2" style="padding-top:0">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2017 Todos los derechos reservados
                <span class="piereyed right">
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
    <!-- dropify-->
    <script src="{{ URL::asset('js/dropify.min.js')}}"></script>
    <!-- formater -->
    <script src="{{ URL::asset('js/jquery.formatter.min.js')}}"></script>
    <!-- chatjs -->
    <script src="{{ URL::asset('js/chart.min.js')}}"></script>
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