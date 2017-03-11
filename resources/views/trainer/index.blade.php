@extends('index')

@section('styles')
<style></style>
@endsection

@section('content')
<div class="section">

    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('trainer.index') }}" class="breadcrumb">Entrenadores</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">

            <div class="row">
                <div class="col m3 s12">
                    <span class="h1">Entrenadores</span>
                </div>
                <div class="opc col m9 s12" style="text-align:right;display:none">
                    <a id="ver" href="" title="Ver" class=" waves-effect waves-light btn blue "><i class="material-icons left">visibility</i>Ver</a>
                    <a id="editar" href="" title="Editar" class=" waves-effect waves-light btn yellow darken-1 "><i class="material-icons left">mode_edit</i>Editar</a>
                    <a id="eliminar" href="" data-target="" title="Eliminar" class=" waves-effect waves-light btn red "><i class="material-icons left">delete</i>Eliminar</a>
                </div>
            </div>

            <div class="fixed-action-btn">
                <a href="{{ route('trainer.create') }}" title="Nuevo" class="btn-floating btn-large black">
                    <i class="large material-icons">person_add</i>
                </a>
                <ul>
                    <li><a href="#asignar" class="btn-floating grey darken-1" title="Asignar"><i class="material-icons">person</i></a></li>
                </ul>                
            </div>

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
                            @foreach($trainers as $trainer)
                            <tr class="fila"  data-target="modal1">
                                <td class="center">{{ $trainer->num_doc }}</td>
                                <td>{{ $trainer->name }}</td>
                                <td>{{ $trainer->lastname1. " " . $trainer->lastname2 }}</td>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="check filled-in" id="{{ $trainer->id }}" />
                                        <label for="{{ $trainer->id }}"></label>
                                    </p>
                                </td>

                            </tr>   

                            <!--     modal-->
                            <div id="{{'modal_'.$trainer->id }}" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                                    <p>Está a punto de eliminar este elemento.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('trainer.delete', $trainer->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
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


<!-- Modal Structure -->
<div id="asignar" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Asignar rol de entrenador</h4>
      <div class="row">
        <form id="asignar_entrenador" action="{{route('trainer.storerole')}}" method="post" novalidate="true" class="col s12">
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


      </form>
  </div>

</div>
<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons left">clear</i>Cancelar</a>
  <button type="submit" form="asignar_entrenador" class="waves-effect waves-light btn "><i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar</button>
</div>
</div>


@endsection



@section('scripts')

<script>
var people = {};
    $( document ).ready(function(){


        //para manejar los botones de opciones para entrenadores
        $( ".opcion" ).click(function() {

            var me = $( this ).find('input') ;
            if(me.is(':checked')){
                me.prop('checked', false); 
                $(".opc").slideUp( 400 );
            }        
            else{
                me.prop('checked', true);  
                $(".opc").slideDown( 400 );
                $("#eliminar").attr("data-target","modal_"+me.attr("id"));
                $("#editar").attr("href","entrenadores/edit/"+me.attr("id"));
            }    
            //descheqea los demas
            $( "input" ).not( "#"+ me.attr("id") ).prop('checked', false);


        });

        //    $("select").val('10');
        $('select').addClass("browser-default");
        $('select').material_select();

                //ajax
        var params = $('#asignar_entrenador').serialize();

        $.ajax({
            type: 'POST',
            url: '/searchTrainer',
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(personas) {
                // alert(personas[1]['lastname1']);
                var size = personas.length;
                
                for(var i = 0; i < size; i++){
                    people[personas[i]['name'] + ' ' +  personas[i]['lastname1'] + ' ' + personas[i]['lastname2']] = personas[i]['id'];
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
            $("#nombre").val(people[$( "#name" ).val()]);
        });

    });

</script>
@endsection