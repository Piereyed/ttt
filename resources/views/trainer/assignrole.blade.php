@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('trainer.index') }}" class="breadcrumb">Entrenadores</a>
                    <a href="#" class="breadcrumb">Asignar</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Asignar rol de entrenador</span>
            <div class="row">
                <form id="asignar_entrenador" action="{{ route('trainer.storerole') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col s12">
                            <table class="datatable responsive-table bordered highlight">
                                <thead>
                                    <tr>
                                        <th class="center" data-field="id">DNI</th>
                                        <th data-field="name">Nombres</th>
                                        <th data-field="lastname1">Apellidos</th>
                                        <th class="center" data-field="options">Elegir</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($persons as $person)
                                    <tr class="fila"  data-target="modal1">
                                        <td class="center">{{ $person->num_doc }}</td>
                                        <td>{{ $person->name }}</td>
                                        <td>{{ $person->lastname1. " " . $person->lastname2 }}</td>
                                        <td class="opcion center">
                                            <p style="text-align: center;">
                                                <input type="radio" name="elegido" value="{{$person->id}}" id="{{ $person->id }}" />
                                                <label for="{{ $person->id }}"></label>
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach                 
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row"  style="text-align:center">
                        <div class="col s12">
                            <a href="{{ route('trainer.index') }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
                                <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                            </a>
                            <button id="submit" title="Guardar" type="submit" disabled class="btn-large waves-effect waves-light btn ">
                                <i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar
                            </button >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')

<script>
    $( document ).ready(function(){

        //para manejar los botones de opciones para entrenadores
        $( ".opcion" ).click(function() {
            var me = $( this ).find('input').prop('checked', true) ;
            $("#submit").removeAttr("disabled"); 
        });


        //    $("select").val('10');
        $('select').addClass("browser-default");
        $('select').material_select();

    });

</script>
@endsection