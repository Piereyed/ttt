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
        <!--        Fontawesome-->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
        <!-- Styles -->
        <!--    <link href="/css/app.css" rel="stylesheet">-->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css')}}"  media="screen,projection"/>

        <style>
            html{                
                display: table;
                height: 100%;
                margin: auto;                
            }
            body{                
                display: table-cell; 
                vertical-align: middle;                
                height: 100%;                
                background-image: url(  {{ asset('images/wallpapaer.jpg') }} );
                background-repeat: no-repeat;                
                background-position: center top;                
            }
            .card-panel{
                background-color: rgba(255,255,255,0.9);
            }

            .profile-image-login {
                width: 100px;
                height: 100px !important;
            }

            .login-form-text {
                text-transform: uppercase;
                letter-spacing: 2px;
                font-size: 1.8rem;
            }
            .margin{
                margin: 0 !important;
            }
            .login-form {
                width: 280px;
            }

            .login-text {
                margin-top: -6px;
                margin-left: -6px !important;
            }
            .help-block{
                color: red;
            }
            
            .input-field .prefix.active{
                
            }
            
            a{
                color: gray!important;
            }
        </style>


        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                              'csrfToken' => csrf_token(),
                              ]) !!};
        </script>

    </head>
    <body class="loaded">


        @yield('content')

        <script src="{{ URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('js/materialize.js')}}"></script>        
    </body>
</html>
