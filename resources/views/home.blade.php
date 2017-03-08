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

             html{                
                display: table;
                height: 100%;
                margin: auto; 
                color: white;               
            }
            body{                
                display: table-cell; 
                vertical-align: middle;                
                height: 100%;                
                background-image: url(  {{ asset('images/wallpapaer.jpg') }} );
                background-repeat: no-repeat;                
                background-position: center top;                
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
        </style>


        <script>
            window.Laravel = {!! json_encode([
                              'csrfToken' => csrf_token(),
                              ]) !!};
        </script>

    </head>
    <body class="loaded" onload="myFunction()" >

        <!-- <div id="loader" class="preloader-wrapper big active" style="left: 45%; top: 40%; position: absolute; background: #fff;">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
                </div><div class="circle-clipper right">
                <div class="circle"></div>
                </div>
            </div>
        </div> -->

        <main id="main" class="xxx animate-bottom">
            <div class="container">
                @yield('content')
            </div>
        </main>

       

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
        <!-- <script src="{{ URL::asset('js/init.js')}}"></script> -->

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