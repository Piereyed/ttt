@extends('index')
@section('content')

<div class="section">    
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('local.index') }}" class="breadcrumb">Sedes</a>                    
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Sedes</span>
            <div class="row" style="min-height:36px">
                <div class="col m3 s12">
                    <h6>Se encontraron {{ $size }} sedes</h6>
                </div>
                <div class="opc col m9 s12" style="text-align:right;display:none">
                    <!--                    <a title="Ver" class="waves-effect waves-light btn blue disabled"><i class="material-icons left">visibility</i>Ver</a>-->
                    <a id="editar" href="" title="Editar"  class="waves-effect waves-light btn yellow darken-1 "><i class="material-icons left">mode_edit</i>Editar</a>
                    <a id="eliminar" data-target="" title="Eliminar" class="waves-effect waves-light btn red "><i class="material-icons left">delete</i>Eliminar</a>
                </div>
            </div>

            <div class="fixed-action-btn horizontal">
                <a href="{{ route('local.create') }}" title="Nueva sede" class="btn-floating btn-large green">
                    <i class="material-icons">add</i>
                </a>                
            </div>


            <!-- Modal Structure --> 

            <div class="row">
                <div class="col s12">
                    <table class="responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="id">Código</th>
                                <th class="center" data-field="name">Sede</th>
                                <th data-field="lastname1">Dirección</th>
                                <th class="center" data-field="options">Elegir</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($locals as $local)
                            <tr class="fila" data-target="modal1">
                                <td class="center">{{ $local->id }}</td>
                                <td class="center">{{ $local->name }}</td>
                                <td>{{ $local->address }}</td>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="check filled-in" id="{{ $local->id }}" />
                                        <label for="{{ 'check_'.$local->id }}"></label>
                                    </p>
                                </td>

                            </tr>

                            <div id="{{'modal_'.$local->id }}" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                                    <p>Está a punto de eliminar este elemento.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('local.delete', $local->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
                                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCELAR</a>
                                </div>
                            </div>  
                            @endforeach                 
                        </tbody>
                    </table>
                    {{ $locals->links() }}
                </div>
            </div>            
        </div>                    
    </div>

</div>
@endsection


@section('scripts')

<script>
    $( document ).ready(function(){


        //para manejar los botones de opciones para sedes
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
                $("#editar").attr("href","sedes/edit/"+me.attr("id"));
            }    
            //descheqea los demas
            $( "input" ).not( "#"+ me.attr("id") ).prop('checked', false);


        });

    });

</script>
@endsection