@extends('index')
@section('content')

@section('styles')
<style>
    select{
        display: inline-block !important;
        width: inherit;
    }
</style>
@endsection

<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <div class="col m12">

            <div class="row">
                <div class="col m3 s12">
                    <span class="h1">Administradores</span>
                </div>
                <div class="opc col m9 s12" style="text-align:right;display:none">
                    <a id="ver" href="" title="Ver" class=" waves-effect waves-light btn blue "><i class="material-icons left">visibility</i>Ver</a>
                    <a id="editar" href="" title="Editar" class=" waves-effect waves-light btn yellow darken-1 "><i class="material-icons left">mode_edit</i>Editar</a>
                    <a id="eliminar" href="" data-target="" title="Eliminar" class=" waves-effect waves-light btn red "><i class="material-icons left">delete</i>Eliminar</a>
                </div>
            </div>

            <div class="fixed-action-btn horizontal">
                <a href="{{ route('admin.create') }}" title="Nuevo administrador" class="btn-floating btn-large green">
                    <i class="large material-icons">add</i>
                </a>                
            </div>

            <table class="datatable responsive-table bordered highlight">
                <thead>
                    <tr>
                        <th class="center" data-field="id">Código</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="lastname1">Apellidos paterno</th>
                        <th class="center" data-field="options">Elegir</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($admins as $admin)
                    <tr class="fila"  data-target="modal1">
                        <td class="center">{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->lastname1. " " . $admin->lastname2 }}</td>
                        <td class="opcion center">
                            <p>
                                <input type="checkbox" class="check filled-in" id="{{ $admin->id }}" />
                                <label for="{{ $admin->id }}"></label>
                            </p>
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
@endsection



@section('scripts')

<script>
    $( document ).ready(function(){


        //para manejar los botones de opciones para administradores
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
                $("#editar").attr("href","admins/edit/"+me.attr("id"));
            }    
            //descheqea los demas
            $( "input" ).not( "#"+ me.attr("id") ).prop('checked', false);


        });

        //    $("select").val('10');
        $('select').addClass("browser-default");
        $('select').material_select();

    });

</script>
@endsection