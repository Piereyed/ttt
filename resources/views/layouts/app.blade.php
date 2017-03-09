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
