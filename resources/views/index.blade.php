<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>
        <!--Importar archivos-->
        <link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <!--        Fontawesome-->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
        <title>Clientes</title>        
    </head>
    <body>
        <header></header>
        <main>
            <nav class="green lighten-1" role="navigation">
                <div class="nav-wrapper container">
                    <a id="logo-container" href="#" class="brand-logo">Inicio</a>

                    <ul class="right hide-on-med-and-down">
                        <li><a href="#">Sedes</a></li>
                        <li><a href="#">Clientes</a></li>
                        <li><a href="#">Ejercicios</a></li>
                        
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
        <script src="{{ URL::asset('js/materialize.min.js')}}"></script>        
        <script src="{{ URL::asset('js/init.js')}}"></script>        
    </body>
</html>
