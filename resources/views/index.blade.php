<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        
        @yield('styles')
        <script>
            window.Laravel = {!! json_encode([
                              'csrfToken' => csrf_token(),
                              ]) !!};
        </script>


        <title>PowerGym</title>        
    </head>
    <body>
        <header></header>
        <main>
            <ul id="dropdown1" class="dropdown-content">

                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i> Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <nav class="green lighten-1" role="navigation">
                <div class="nav-wrapper container">
                    <a id="logo-container" href="#" class="brand-logo">Inicio</a>

                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('local.index') }}">Sedes</a></li>
                        <li><a href="{{ route('client.index') }}">Clientes</a></li>
                        <li><a href="#">Ejercicios</a></li>
                        @if (!Auth::guest())
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">perm_identity</i> {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                        @endif

                    </ul>

                    <ul id="nav-mobile" class="side-nav">
                        <li><a href="#">Clientes</a></li>
                        <li><a href="#">Navbar Link</a></li>
                        <li><a href="#">Navbar Link</a></li>
                        <li><a href="#">Navbar Link</a></li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>

            <ul id="slide-out" class="side-nav">
                <li><div class="userView">
                    <div class="background">
                        <img src="{{ asset('images/logo.png')}}">
                    </div>
                    <a href="#!user"><img class="circle" src="{{ asset('images/perfil.jpg')}}"></a>
                    <a href="#!name"><span class="white-text name">Pier Rojas</span></a>
                    <a href="#!email"><span class="white-text email">piereyedk@gmail.com</span></a>
                    </div></li>
                <li><a href="#!"><i class="material-icons">cloud</i>Bienvenido</a></li>
                <li><a href="#!">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
            </ul>
            <!--                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>-->



            <div class="container">
                @yield('content')
            </div>

        </main>

        <footer class="page-footer">

            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Piereyed</a>
                </div>
            </div>
        </footer>



        <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('js/materialize.js')}}"></script>        
        <script src="{{ URL::asset('js/validate/jquery.validate.min.js')}}"></script>
        <script src="{{ URL::asset('js/validate/additional-methods.min.js')}}"></script>
        <!--        toastr-->
        <script src="{{ asset('js/toastr/toastr.min.js')}}"></script>
        <!--        nprogress-->
        <script src="{{ URL::asset('js/nprogress.js')}}"></script>
        <!--       custom-->
        <script src="{{ URL::asset('js/init.js')}}"></script>  

        @yield('scripts')



        <script type="text/javascript">
            //Code for show success  messages            
            @if( @Session::has('success') )
                toastr.success('{{ @Session::get('success') }}');
            @endif
        </script>

        <script type="text/javascript">
            //Code for show warning  messages
            @if( @Session::has('warning') )
                toastr.error('{{ @Session::get('warning') }}');
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

        <!--
<script>

// Show the progress bar 
NProgress.start();

// Increase randomly
var interval = setInterval(function() { NProgress.inc(); }, 1000);        

// Trigger finish when page fully loaded
jQuery(window).load(function () {
clearInterval(interval);
NProgress.done();
});

// Trigger bar when exiting the page
jQuery(window).unload(function () {
NProgress.start();
});

</script>      
-->
    </body>
</html>
