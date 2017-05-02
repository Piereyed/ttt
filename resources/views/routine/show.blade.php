@extends('index')

@section('styles')
<style type="text/css">
    .indicator{
        left: 0;
        right: 797px;
    }
    .serie , .coma{
        display: inline-block;
    }
    .coma{
        position: relative;
        top: -16px;
    }
    .peso{
        border-bottom: 1px solid black;
        display: block;
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
                    <a href="#!" class="breadcrumb">Ver rutina</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Rutina {{$routine->number}} de {{$routine->athlete->name}} </span>                   

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
                                <p><strong>Cantidad de semanas: </strong>{{$routine->weeks}}</p>
                                <p><strong>Cantidad de sesiones: </strong>{{$routine->total_sessions}}</p>
                            </div>                           
                        </li>
                    </ul>
                </div>
            </div>

            <!-- las rutinas en tabs -->
            <div class="row container_tabs">
                <div class="col s12">
                    <ul class="tabs">
                        @foreach($routine->trainings as $training)
                        <li class="tab col s3"><a href="#{{strtoupper($training->letter)}}">Entrenamiento {{strtoupper($training->letter)}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--  para cada entrenamiento-->
                @foreach($routine->trainings as $training)
                <div id="{{strtoupper($training->letter)}}" class="entrenamiento col s12">
                    <div class="col s12 center"> 
                        <h5><strong>Tipo de sesión :</strong>        
                            @if($training->type_session == 1) 
                            Musculación 
                            @elseif($training->type_session == 2) 
                            Cardiovascular 
                            @endif                           
                        </h5>
                    </div>

                    <!-- calentamiento -->
                    <div class="row calentamiento">
                        <div class="col s12">
                            <h4>Calentamiento</h4>
                        </div>                        

                        <!-- tabla -->
                        <div class="col s12 offset-m3 m6">
                            <table class="tabla_calentamiento responsive-table bordered highlight">
                                <thead>
                                    <tr>            
                                        <th data-field="name">Ejercicio</th>
                                        <th class="center" data-field="phase">Tiempo(seg)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  aqui entran las filas   -->
                                    @foreach($training->training_details as $detail)
                                    @if( $detail->training_exercises[0]->exercise->training_phase_id == 1 )
                                    <tr>
                                        <td>{{ $detail->training_exercises[0]->exercise->name}}</td>
                                        <td class="center">{{ $detail->training_exercises[0]->time}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- estiramiento -->
                    <div class="row estiramiento">
                        <div class="col s12 m6">
                            <h4>Estiramiento</h4>    
                        </div>

                        <!-- tabla -->
                        <div class="col s12 offset-m3 m6">
                            <table class="tabla_calentamiento responsive-table bordered highlight">
                                <thead>
                                    <tr>            
                                        <th data-field="name">Ejercicio</th>
                                        <th class="center" data-field="phase">Tiempo(seg)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  aqui entran las filas   -->
                                    @foreach($training->training_details as $detail)
                                    @if( $detail->training_exercises[0]->exercise->training_phase_id == 3 )
                                    <tr>
                                        <td>{{ $detail->training_exercises[0]->exercise->name}}</td>
                                        <td class="center">{{ $detail->training_exercises[0]->time}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--fin de estiramiento-->

                    <!-- principal -->
                    <div class="row principal">
                        <div class="col s12">
                            <h4>Principal</h4>   
                        </div>

                        <div class="target col s12">
                            <table class="tabla-principal responsive-table bordered highlight">
                                <thead>
                                    <tr>                                            
                                        <th class="center" data-field="type">Tipo</th>
                                        <th class="center" data-field="muscle">Músculo</th>
                                        <th data-field="name">Ejercicio</th>
                                        <th class="center" data-field="name">Series (Lb/Rep)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  aqui entran las filas   -->
                                    @foreach($training->training_details as $detail)
                                    @if( $detail->training_exercises[0]->exercise->training_phase_id == 2 )
                                    <tr>
                                        <td  class="center">{{ $detail->type == 1 ? 'Simple' : ''}}</td>
                                        <td  class="center">{{ $detail->training_exercises[0]->exercise->muscles[0]->name}}</td>
                                        <td>{{ $detail->training_exercises[0]->exercise->name}}</td>
                                        <td class="center">
                                            @foreach( $detail->training_exercises[0]->series as $key => $serie )
                                            @if($key == sizeof($detail->training_exercises[0]->series) -1 )
                                            <div class="serie">
                                                <span class="peso">{{$serie->lb_weight}}</span>
                                                <span>{{$serie->repetitions}}</span>    
                                            </div>

                                            @else
                                            <div class="serie">
                                                <span class="peso">{{$serie->lb_weight}}</span>
                                                <span>{{$serie->repetitions}}</span>    
                                            </div>
                                            <div class="coma">
                                                ,
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                    <!-- fin de principal-->

                </div>
                @endforeach
            </div>
            <!-- fin rutinas en tabs -->



            <div class="row" style="text-align:center">
                <div class="cos s12" >
                    <a href="{{ route('routine.index',$routine->athlete->id) }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
                        <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                    </a>
                    <button  title="Editar" type="submit" class="btn-large waves-effect waves-light btn ">
                        <i class="right fa fa-pencil" aria-hidden="true"></i>Editar
                    </button >
                </div>
            </div>

            <!-- fin de ver-->
        </div>                    
    </div>

</div>



@endsection



@section('scripts')

<script>




</script>
@endsection