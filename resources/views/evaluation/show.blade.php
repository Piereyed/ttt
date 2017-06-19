@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('myathletes.index') }}" class="breadcrumb">Mis atletas</a>
                    <a href="{{ route('evaluation.index',$evaluation->person_id) }}" class="breadcrumb">Evaluaciones</a>
                    <a href="#" class="breadcrumb">Ver Evaluación</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Ver Evaluación</span>
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="{{ asset('storagee/'.$evaluation->person->photo)  }}" alt="{{$evaluation->person->name.' '.$evaluation->person->lastname1.' '.$evaluation->person->lastname2}}" class="circle">
                            <span class="title">{{$evaluation->person->name.' '.$evaluation->person->lastname1.' '.$evaluation->person->lastname2}}</span> <br>
                            <span>Evaluación tomada el: {{  date_format($evaluation->created_at, 'd/m/Y') }}</span>


                            <!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col offset-s0 s12 m6 offset-m3 l6 offset-l3">

                    <table class="responsive-table striped">
                        <thead>
                            <tr>
                                <th class="center">Medida</th>
                                <th class="center">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluation->measures as $measure)
                            <tr>
                                <td class="center">{{$measure->name}}</td>
                                <td class="center">{{$measure->pivot->value}} {{$measure->unity != '-' ? $measure->unity : '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>



            <div class="row"  style="text-align:center">
                <div class="col s12">
                    <a href="{{ route('evaluation.index',$evaluation->person_id) }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
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

