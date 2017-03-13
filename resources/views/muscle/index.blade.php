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
            <span class="h1">Músculos</span>
            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar"  title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red "><i class="material-icons">delete</i></a></li>                  
                    <li hidden><a id="editar"  title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>

                    <li><a id="nuevo" href="{{ route('muscle.create') }}" title="Nuevo" class="btn-floating waves-effect waves-light btn-large green"><i class="material-icons">add</i>
                    </a></li> 
                </ul>             
            </div> 



            <div class="row">
                <div class="col s12">
                    <table class="datatable responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="options">Elegir</th>
                                <th class="center" data-field="id">Código</th>
                                <th data-field="name">Nombre</th>                               
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($muscles as $muscle)
                            <tr>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="{{ $muscle->id }}" />
                                        <label for="{{ $muscle->id }}"></label>
                                    </p>
                                </td>
                                <td class="center">{{ $muscle->id }}</td>
                                <td>{{ $muscle->name }}</td>                              
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