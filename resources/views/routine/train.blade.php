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
                    <a href="{{route('myathletes.index')}}" class="breadcrumb">Mis rutinas</a>
                    <a href="#!" class="breadcrumb">Entrenar</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Entrenamiento {{strtoupper($training->letter)}}</span>                     
            <form method="post" action="{{ route('myroutine.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="session" value="{{ $session->id }}">
                <input type="hidden" name="start" value="{{ date('Y-m-d H:i:s') }}">

                <div class="row">
                    <div class="col s12">
                        <!-- calentamiento -->
                        <h5>Calentamiento</h5>
                        <table>
                            <thead>
                                <tr>            
                                    <th data-field="name">Nombre</th>
                                    <th class="center" data-field="phase">Tiempo(seg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--  aqui entran las filas   -->
                                @foreach($warms as $warm) 
                                <tr>
                                    <td>{{$warm->training_exercises[0]->exercise->name }}</td>
                                    <td class="center">{{$warm->training_exercises[0]->time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <!-- estiramiento -->
                        <h5>Estiramiento</h5>
                        <table>
                            <thead>
                                <tr>            
                                    <th data-field="name">Nombre</th>
                                    <th class="center" data-field="phase">Tiempo(seg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--  aqui entran las filas   -->
                                @foreach($stretchs as $stretch) 
                                <tr>
                                    <td>{{$stretch->training_exercises[0]->exercise->name }}</td>
                                    <td class="center">{{$stretch->training_exercises[0]->time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <!-- principal -->
                        <h5>Principal</h5>
                        @foreach($principals as $principal) 
                        <ul class="collapsible popout" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header">@if($principal->type==1)Simple @endif</div>
                                <div class="collapsible-body center">
                                    @foreach($principal->training_exercises as $t_exercise)
                                    <span>Músculo: {{$t_exercise->exercise->muscles[0]->name}}</span><br>
                                    <span>Ejercicio: {{$t_exercise->exercise->name}}</span><br>
                                    <img class="responsive-img" src="{{ asset('storage/'.$t_exercise->exercise->photo)  }}">
                                    <div class="row">
                                        @foreach($t_exercise->series as $serie)
                                        <div class="col s12">
                                            <table class="bordered highlight">
                                                <tr>
                                                    <td class="center" colspan="3"><strong>SERIE {{$serie->number}}</strong>
                                                    <input type="hidden" name="serie[]" value="{{$serie->id}}"></td>
                                                </tr>
                                                <tr>
                                                    <td>Repeticiones</td>
                                                    <td>{{$serie->repetitions}}</td>
                                                    <td><input type="number" placeholder="Repeticiones hechas" name="repetitions_done[]"></td>
                                                </tr>
                                                <tr>
                                                    <td>Peso</td>
                                                    <td>{{$serie->lb_weight}}lb</td>
                                                    <td><input type="number" placeholder="Peso levantado" name="weight_lifted[]"></td>
                                                </tr>
                                            </table>

                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </li>

                        </ul>
                        @endforeach


                    </div>
                </div>

                <div class="row" style="text-align:center">
                    <div class="cos s12" >
                        <a href="{{route('myroutines.index')}}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
                            <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                        </a>
                        <button  title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
                            <i class="right fa fa-floppy-o" aria-hidden="true"></i>Guardar
                        </button >
                    </div>
                </div>
            </form>
        </div>                    
    </div>

</div>




@endsection



@section('scripts')

<script>




</script>
@endsection