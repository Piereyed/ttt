@extends('index')

@section('styles')
<style>
    .box{

        margin-bottom: 20px;
        padding: 10px;
        border: 1px dashed black;
    }
    .sesion{
        box-shadow: 1px 1px 10px black;
        font-size: 20px;
        display: block;
        padding: 0 10px;
    }
    .tabin{
        padding-top: 30px !important;
    }
    .indicator{
        left: 0;
        right: 797px;
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
                    <a href="#!" class="breadcrumb">Rutinas</a>
                    <a href="#!" class="breadcrumb">Ver resultados</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section  -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Resultados - Rutina {{$routine->number}} </span>                   

            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="{{ asset('storage/'.$routine->athlete->photo)  }}" alt="{{$routine->athlete->name.' '.$routine->athlete->lastname1.' '.$routine->athlete->lastname2}}" class="circle">
                            <div class="col s12 m6">
                                <span class="title">{{$routine->athlete->name.' '.$routine->athlete->lastname1.' '.$routine->athlete->lastname2}}</span>
                                <p><strong>Experiencia: </strong>{{$routine->athlete->experience->name}}</p>
                                <p><strong>Objetivo general: </strong>{{$routine->athlete->goal->name}}</p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>Periodo: </strong>{{$routine->period->name}}</p>
                                <p><strong>Objetivo del periodo: </strong>{{$routine->period->specific_goal}}</p>
                                <p><strong>Cantidad de sesiones: </strong>{{$routine->total_sessions}}</p>
                            </div>                           
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#detallado">Detallado</a></li>
                        <li class="tab col s3"><a href="#sesion">Por sesión</a></li>
                        <li class="tab col s3"><a href="#general">General</a></li>
                        <li class="tab col s3"><a href="#ejercicio">Por ejercicio</a></li>
                    </ul>
                </div>
                <div id="detallado" class="col s12 tabin">
                    <!-- para cada sesion -->
                    @foreach($routine->training_sessions as $session)

                    <!-- principal -->
                    <div class="row">                        
                        <div class="col s12 ">
                           <span class="sesion">SESIÓN {{$session->number}} ({{  date_format($session->created_at, 'd/m')  }})</span>
                            
                        </div>

                        <div class="col s12">
                            @foreach($session->training->training_details as $detail)
                            @if($detail->training_exercises->first()->exercise->training_phase_id == 2 )
                            <div class="box">
                                <strong>Músculo:</strong> <span>{{$detail->training_exercises->first()->exercise->muscles->first()->name  }}</span> <br>
                                <strong>Ejercicio:</strong> <span>{{$detail->training_exercises->first()->exercise->name}}</span>

                                <table class="tabla-principal responsive-table bordered highlight">
                                    <thead>
                                        <tr>                                           
                                            <th class="center" data-field="name">Serie</th>
                                            <th class="center" data-field="name">Repeticiones objetivo</th>
                                            <th class="center" data-field="name">Repeticiones hechas</th>
                                            <th class="center" data-field="name">Peso objetivo</th>
                                            <th class="center" data-field="name">Peso levantado</th>
                                            <th class="center" data-field="name">Rendimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--                                  aqui entran las filas   -->
                                        @foreach($detail->training_exercises->first()->series as $serie)
                                        <tr>
                                            <td class="center">{{$serie->number}}</td>
                                            <td class="center">{{$serie->repetitions}}</td>
                                            <td class="center">{{$serie->training_session_series->where('training_session_id',  $session->id)->first()->repetitions_done}}</td>
                                            <td class="center">{{$serie->lb_weight}}</td>
                                            <td class="center">{{$serie->training_session_series->where('training_session_id',  $session->id)->first()->weight_lifted}}</td>
                                            <td class="center">{{$serie->training_session_series->where('training_session_id',  $session->id)->first()->efficiency}}%</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            @endif
                            @endforeach
                        </div>                        
                    </div>
                    <!-- fin de principal-->

                    @endforeach
                </div>
                <div id="sesion" class="col s12 tabin">
                    
                </div>
                <div id="general" class="col s12 tabin">Por ejedsada</div>
                <div id="ejercicio" class="col s12 tabin">sdasd</div>
            </div>






            <div class="row" style="text-align:center">
                <div class="cos s12" >
                    <a href="{{ route('routine.index',$routine->athlete->id) }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
                        <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                    </a>
                </div>
            </div>
        </div>                    
    </div>

</div>



@endsection



@section('scripts')

<script>

$( document ).ready(function(){

});


</script>
@endsection