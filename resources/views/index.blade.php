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
        <title>Inicio</title>        
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo">Inicio</a>
                
                <ul class="right hide-on-med-and-down">
                    <li><a href="#">Barra</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Clientes</a></li>
                    <li><a href="#">Navbar Link</a></li>
                    <li><a href="#">Navbar Link</a></li>
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        


        <div class="container">
            @yield('content')
        </div>

        <footer class="page-footer orange">
            
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
