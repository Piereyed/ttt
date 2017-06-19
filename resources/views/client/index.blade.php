@extends('index')

@section('styles')
<style>

</style>
@endsection


@section('content')
<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('client.index') }}" class="breadcrumb">Clientes</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Clientes</span>
            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar"  title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red "><i class="material-icons">delete</i></a></li>  

                    <li hidden><a id="editar"  title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>

                    <li hidden ><a id="ver"  title="Ver" class="btn-floating btn-large waves-effect waves-light blue "><i class="material-icons">visibility</i></a></li>

                    <li><a href="#asignar" title="Asignar" class="btn-floating waves-effect waves-light btn-large green darken-2"><i class="material-icons">person</i>
                        </a></li> 

                    <li><a id="nuevo" href="{{ route('client.create') }}" title="Nuevo" class="btn-floating waves-effect waves-light btn-large green"><i class="material-icons">person_add</i>
                        </a></li> 
                </ul>             
            </div> 

            <div class="row">
                <div class="col s12">
                    <table class="datatable responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="options">Elegir</th>
                                <th class="center" data-field="id">DNI</th>
                                <th data-field="name">Nombres</th>
                                <th data-field="lastname1">Apellidos</th>
                                <th data-field="trainer">Entrenador</th>                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="{{ $client->person->id }}" />
                                        <label for="{{ $client->person->id }}"></label>
                                    </p>
                                </td>
                                <td class="center">{{ $client->person->num_doc }}</td>
                                <td>{{ $client->person->name }}</td>
                                <td>{{ $client->person->lastname1. " " . $client->person->lastname2 }}</td>
                                <td>{{ $client->person->trainer->name. " " . $client->person->trainer->lastname1 }}</td>
                            </tr>   

                            <!--     modal-->
                            <div id="{{'modal_'.$client->person->id }}" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                                    <p>Está a punto de eliminar este elemento.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('client.delete', $client->person->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCELAR</a>
                                </div>
                            </div>
                            @endforeach                 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                    
    </div>

</div>


<!-- Modal Asignar -->
<div id="asignar" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Asignar rol de cliente</h4>
        <div class="row">
            <form id="asignar_cliente" action="{{route('client.storerole')}}" method="post" novalidate="true" class="col s12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">textsms</i>
                                <input type="text" id="name" class="autocomplete">

                                <label for="name">Nombre/Apellidos</label>
                            </div>
                        </div>
                        <input type="text" id="nombre" name="nombre" hidden >
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="prefix fa fa-calendar" aria-hidden="true"></i>
                        <input id="dias_de_entrenamiento" type="number" value="{{ old('dias_de_entrenamiento') }}" name="dias_de_entrenamiento">
                        <label class="active" for="dias_de_entrenamiento">Días de entrenamiento</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="prefix fa fa-codepen" aria-hidden="true"></i>
                        <input  id="dias_de_congelamiento" type="number" value="{{ old('dias_de_congelamiento') }}" name="dias_de_congelamiento">
                        <label class="active" for="dias_de_congelamiento">Días de congelamiento</label>
                    </div>
                </div>
                <input hidden type="text" id="entrenador" name="entrenador">
                <h5>Entrenador</h5>
                <div class="row">
                    @foreach($trainers as $trainer)
                    <div class="col s12 m4 l3">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{ asset('storagee/'.$trainer->photo)  }}">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">{{$trainer->name.' '.$trainer->lastname1}}</span>
                                <p>Asignados: 3</p>
                                <input class="trainerid" type="tex" hidden value="{{$trainer->id}}">
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>


            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons left">clear</i>Cancelar</a>
        <button type="submit" form="asignar_cliente" class="waves-effect waves-light btn "><i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar</button>
    </div>
</div>


@endsection



@section('scripts')

<script>
    var people = {};
    var codigos = {};

    $( ".opcion" ).click(function() {

        var me = $( this ).find('input') ;
        if(me.is(':checked')){
            me.prop('checked', false); 
            $('.fixed-action-btn').closeFAB();
            $("#ver").parent().hide();
            $("#editar").parent().hide();
            $("#eliminar").parent().hide();

        }        
        else{
            me.prop('checked', true);            
            $("#eliminar").attr("data-target","modal_"+me.attr("id"));
            $("#eliminar").parent().show();
            $("#editar").attr("href","clientes/edit/"+me.attr("id"));
            $("#editar").parent().show();
            $("#ver").attr("href","clientes/show/"+me.attr("id"));
            $("#ver").parent().show();
            $('.fixed-action-btn').openFAB();
        }    
        //descheqea los demas
        $( "input" ).not( "#"+ me.attr("id") ).prop('checked', false);

    });

    $( document ).ready(function(){        

        //    $("select").val('10');
        $('select').addClass("browser-default");
        $('select').material_select();

        //ajax
        var params = $('#asignar_cliente').serialize();

        $.ajax({
            type: 'POST',
            url: '/searchClient',
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(personas) {                
                var size = personas.length;

                for(var i = 0; i < size; i++){
                    people[personas[i]['name'] + ' ' +  personas[i]['lastname1'] + ' ' + personas[i]['lastname2']] = 'storage/' + personas[i]['photo']; //ruta de imagen
                    codigos[personas[i]['name'] + ' ' +  personas[i]['lastname1'] + ' ' + personas[i]['lastname2']] = personas[i]['id']; //codigo
                }

                $('input.autocomplete').autocomplete({
                    data: people,
                    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                });
            },
            error: function(data) {
                alert("Error.")
            }
        });
        // fin ajax

        $( "#name" ).change(function() {
            $("#nombre").val(codigos[$( "#name" ).val()]);
        });

        $(".card").on("click",function(){
            $(".card").css("border","none");
            $(this).css("border","1px solid green");
            $("#entrenador").val($(this).find(".trainerid").val());
        });

    });

</script>
@endsection