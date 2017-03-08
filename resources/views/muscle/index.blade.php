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
                <div class="col s12 m12 l12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('muscle.index') }}" class="breadcrumb">Músculos</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col m3 s12">
                    <span class="h1">Músculos</span>
                </div>
                <div class="opc col m9 s12" style="text-align:right;display:none">
                    <a id="ver" href="" title="Ver" class=" waves-effect waves-light btn blue "><i class="material-icons left">visibility</i>Ver</a>
                    <a id="editar" href="" title="Editar" class=" waves-effect waves-light btn yellow darken-1 "><i class="material-icons left">mode_edit</i>Editar</a>
                    <a id="eliminar" href="" data-target="" title="Eliminar" class=" waves-effect waves-light btn red "><i class="material-icons left">delete</i>Eliminar</a>
                </div>
            </div>

            <div class="fixed-action-btn horizontal">
                <a href="{{ route('muscle.create') }}" title="Nuevo Músculo" class="btn-floating btn-large green">
                    <i class="large material-icons">add</i>
                </a>                
            </div>

            <div class="row">
                <div class="col s12">
                    <table class="datatable responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="id">Código</th>
                                <th data-field="name">Nombre</th>                                
                                <th class="center" data-field="options">Elegir</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($muscles as $muscle)
                            <tr class="fila"  data-target="modal1">
                                <td class="center">{{ $muscle->id }}</td>
                                <td>{{ $muscle->name }}</td>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="check filled-in" id="{{ $muscle->id }}" />
                                        <label for="{{ $muscle->id }}"></label>
                                    </p>


                                </td>

                            </tr>   

                            <!--     modal-->
                            <div id="{{'modal_'.$muscle->id }}" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                                    <p>Está a punto de eliminar este elemento.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('muscle.delete', $muscle->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
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
@endsection



@section('scripts')

<script>
    $( document ).ready(function(){


        //para manejar los botones de opciones para musculos
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
                $("#editar").attr("href","musculos/edit/"+me.attr("id"));
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