@extends('index')
@section('styles')
<style>
    input{
        text-align: center;
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
                    <a href="{{ route('client.index') }}" class="breadcrumb">Cliente</a>
                    <a href="#" class="breadcrumb">Nueva evaluación de RM</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nueva evaluación de RM</span>
            @if(sizeof($arr_exercises) > 0 )
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="{{ asset('storagee/'.$client->photo)  }}" alt="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="circle">
                            <span class="title">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>


                            <!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
                        </li>
                    </ul>
                </div>
                <form id="evaluar" files="true"  action="{{ route('evaluation_rm.store',$client->id) }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">




                    <!-- ejercicios -->
                    <div class="row">
                        <div class="col s12 l6 offset-l3">
                            <table class="responsive-table bordered highlight">
                                <thead>
                                    <tr>
                                        <th class="center" data-field="options">Ejercicio</th>
                                        <th class="center" data-field="muscle">Repeticiones</th>
                                        <th class="center" data-field="muscle">Peso (Lb)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($t_exercises as $t_exercise)
                                    @if(in_array($t_exercise->{'exercise_id'}, $arr_exercises))
                                    <tr>
                                        <td hidden><input name="ids[]" value="{{ $t_exercise->{'id'} }}" type="hidden"></td>
                                        <td>{{$t_exercise->{'name'} }}</td>
                                        <td class="center"><input name="rep[]" type="number" placeholder="Cantidad"></td>
                                        <td class="center"><input name="peso[]" type="number" placeholder="Peso"></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row"  style="text-align:center">
                        <div class="col s12">
                            <a href="{{ route('myathletes.index') }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
                                <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                            </a>
                            <button  title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
                                <i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar
                            </button >
                        </div>
                    </div>
                </form>

            </div>
            @else
            <h4>No hay ejercicios por evaluar</h4>
            @endif
        </div>
    </div>



</div>

<form id="formulario" method="post" novalidate="true" class="col s12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
</form>


@endsection

@section('scripts')
<script>


</script>
@endsection

