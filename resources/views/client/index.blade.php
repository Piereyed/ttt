@extends('index')
@section('content')

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <div class="col m12">
            <h1>Clientes</h1>
            <div class="row" style="min-height:36px">
                <div class="col m3 s12">
                    <h6>Se encontraron {{ $size }} clientes</h6>
                </div>
                <div class="opc col m9 s12" style="text-align:right;display:none">
                    <a id="ver" href="" title="Ver" class=" waves-effect waves-light btn blue "><i class="material-icons left">visibility</i>Ver</a>
                    <a id="editar" href="" title="Editar" class=" waves-effect waves-light btn yellow darken-1 "><i class="material-icons left">mode_edit</i>Editar</a>
                    <a id="eliminar" href="" data-target="" title="Eliminar" class=" waves-effect waves-light btn red "><i class="material-icons left">delete</i>Eliminar</a>
                </div>
            </div>
            
            <div class="fixed-action-btn horizontal">
                <a href="{{ route('client.create') }}" title="Nuevo cliente" class="btn-floating btn-large green">
                    <i class="large material-icons">add</i>
                </a>                
            </div>

            <table class="responsive-table bordered highlight">
                <thead>
                    <tr>
                        <th class="center" data-field="id">Código</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="lastname1">Apellidos paterno</th>
                        <th class="center" data-field="options">Elegir</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clients as $client)
                    <tr class="fila"  data-target="modal1">
                        <td class="center">{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->lastname1. " " . $client->lastname2 }}</td>
                        <td class="opcion center">
                            <p>
                                <input type="checkbox" class="check filled-in" id="{{ $client->id }}" />
                                <label for="{{ $client->id }}"></label>
                            </p>
                            

                        </td>

                    </tr>   
                    
                    <!--     modal-->
                    <div id="{{'modal_'.$client->id }}" class="modal bottom-sheet">
                        <div class="modal-content">
                            <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                            <p>Está a punto de eliminar este elemento.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('client.delete', $client->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCELAR</a>
                        </div>
                    </div>
                    @endforeach                 
                </tbody>
            </table>
            {{ $clients->links() }}
        </div>                    
    </div>

</div>
@endsection



@section('scripts')

<script>
    $( document ).ready(function(){


        //para manejar los botones de opciones para clientes
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
                $("#editar").attr("href","clientes/edit/"+me.attr("id"));
            }    
            //descheqea los demas
            $( "input" ).not( "#"+ me.attr("id") ).prop('checked', false);


        });

    });

</script>
@endsection