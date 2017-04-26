@extends('index')

@section('styles')
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
            <span class="h1">Resultados de las sesiones - Rutina {{$routine->number}} </span>                   

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


            <div class="row">                
                <!-- para cada sesion -->
                @foreach($routine->training_sessions as $session)

                <!-- principal -->
                <div class="row principal">                        
                    <div class="col s12">
                        SESIÓN {{$session->number}} ({{$session->created_at}})
                    </div>
                    <div class="col s12">
                        @foreach($session->training->training_details as $detail)
                        <strong>Músculo <span>{{$detail->training_exercises[0]->exercise->muscles[0]->name  }}</span></strong>
                        <strong>Ejercicio <span>{{$detail->training_exercises[0]->exercise->name}}</span></strong>

                        <table class="tabla-principal responsive-table bordered highlight">
                            <thead>
                                <tr>                                           
                                    <th class="center" data-field="name">Serie</th>
                                    <th class="center" data-field="name">Repeticiones objetivo</th>
                                    <th class="center" data-field="name">Repeticiones hechas</th>
                                    <th class="center" data-field="name">Peso objetivo</th>
                                    <th class="center" data-field="name">Peso levantado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--  aqui entran las filas   -->
                                @foreach($detail->training_exercises as $t_exercise)
                                <tr>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endforeach
                    </div>                        
                </div>
                <!-- fin de principal-->

                @endforeach
            </div>
            <!-- fin rutinas en tabs -->



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




</script>
@endsection