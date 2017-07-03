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
                    <a href="{{ route('admin.index') }}" class="breadcrumb">Administradores</a>
                </div>
            </div>
        </nav>
    </div>

    
    <div class="row">
        <div class="col s12">


            <span class="h1">Administradores</span> 

            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar" title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a></li>                  
                    <li hidden><a id="editar" title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>
                    <li hidden ><a id="ver"  title="Ver" class="btn-floating btn-large waves-effect waves-light blue "><i class="material-icons">visibility</i></a></li>

                    <li><a href="#asignar" title="Asignar" class="btn-floating waves-effect waves-light btn-large green darken-2">   <i class="material-icons">person</i>
                    </a></li> 

                    <li><a id="nuevo" href="{{ route('admin.create') }}" title="Nuevo" class="btn-floating waves-effect waves-light btn-large green">   <i class="material-icons">person_add</i>
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
                                <th data-field="local">Sedes</th>                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="{{ $admin->id }}" />
                                        <label for="{{ $admin->id }}"></label>
                                    </p>
                                </td>
                                <td class="center">{{ $admin->num_doc }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->lastname1. " " . $admin->lastname2 }}</td>
                                <td> 
                                    @foreach($admin->locals->unique() as $local)
                                    {{$local->name}}<br> 
                                    @endforeach
                                </td>
                            </tr>   

                            <!--     modal-->
                            <div id="{{'modal_'.$admin->id }}" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                                    <p>Está a punto de eliminar este elemento.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('admin.delete', $admin->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
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

<!-- Modal asignar -->
<div id="asignar" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Asignar rol de entrenador</h4>
      <div class="row">
        <form id="asignar_admin" action="{{route('admin.storerole')}}" method="post" novalidate="true" class="col s12">
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
  <button type="submit" form="asignar_admin" class="waves-effect waves-light btn "><i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar</button>
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
            $("#editar").attr("href","admins/edit/"+me.attr("id"));
            $("#editar").parent().show();
            $("#ver").attr("href","admins/show/"+me.attr("id"));
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
        var params = $('#asignar_admin').serialize();

        $.ajax({
            type: 'POST',
            url: '/searchAdmin',
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(personas) {                
                var size = personas.length;                
                for(var i = 0; i < size; i++){
                    people[personas[i]['name'] + ' ' +  personas[i]['lastname1'] + ' ' + personas[i]['lastname2']] = 'storagee/' + personas[i]['photo']; //ruta de imagen
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


    });

</script>
@endsection