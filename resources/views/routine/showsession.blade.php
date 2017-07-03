@extends('index')
@section('styles')
<style type="text/css">
    input{
        text-align: center;;
    }
</style>
@endsection

@section('content')
<div class="section">

    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{route('myroutines.index')}}" class="breadcrumb">Mis sesiones</a>
                    <a href="#!" class="breadcrumb">Ver sesión</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Sesión {{$session->number}}</span>                     

        </div>                    
    </div>

    <div class="row">
        <strong>Duración:</strong> <span>{{$session->duration}} minutos</span><br>
        <strong>Trabajo a realizar:</strong> <span>{{$session->work_objetive}}</span><br>
        <strong>Trabajo realizado:</strong> <span>{{$session->work_done}}</span><br>
        <strong>Completado:</strong> <span>{{$session->efficiency}}%</span><br>
    </div>

    <div class="row">
        <div class="col s12">
            <table class="tabla-por-ejercicios responsive-table bordered highlight">
                <thead>
                    <tr>                                           
                        <th class="center" data-field="name">Ejercicio</th>
                        <th class="center" data-field="name">Completado</th>
                        <th class="center" data-field="name">RM alcanzado</th>
                        <th class="center" data-field="name">RM récord</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($t_s_exercises as $key => $t_s_exercise)                    
                    <tr>
                        <td class="center">{{ $t_s_exercise->exercise->name }}</td>
                        <td class="center">{{ $t_s_exercise->efficiency }} %</td>
                        <td class="center">{{ $t_s_exercise->rm }} lb</td>
                        @foreach($rows as $row) 
                        @if($row->exercise_id == $t_s_exercise->exercise_id)
                        <td class="center">{{ $row->rm }} lb</td>
                        @endif
                        @endforeach 
                    </tr>                    
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row" style="text-align:center">
        <div class="cos s12" >
            <a href="{{route('myroutines.index')}}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
                <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
            </a>
        </div>
    </div>
</div>




@endsection



@section('scripts')

<script>




</script>
@endsection