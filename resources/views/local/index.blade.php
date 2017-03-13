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


            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar" title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a></li>                  
                    <li hidden><a id="editar" title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>

                    <li><a id="nuevo" href="{{ route('local.create') }}" title="Nueva" class="btn-floating waves-effect waves-light btn-large green">   <i class="material-icons">add</i>
                    </a></li> 
                </ul>             
            </div>

            <div class="row">
                <div class="col s12">
                    <table class="datatable responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="options">Elegir</th>
                                <th class="center" data-field="name">Sede</th>
                                <th data-field="lastname1">Dirección</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locals as $local)
                            <tr>  
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="{{ $local->id }}" />
                                        <label for="{{ $local->id }}"></label>
                                    </p>
                                </td>                              
                                <td class="center">{{ $local->name }}</td>
                                <td>{{ $local->address }}</td>
                            </tr>

                            <!--     modal-->
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

                </div>
            </div>            
        </div>                    
    </div>

</div>
@endsection


@section('scripts')

<script>

    $( ".opcion" ).click(function() {

        var me = $( this ).find('input') ;
        if(me.is(':checked')){
            me.prop('checked', false); 
            $('.fixed-action-btn').closeFAB();
            $("#editar").parent().hide();
            $("#eliminar").parent().hide();
        }        
        else{
            me.prop('checked', true);            
            $("#eliminar").attr("data-target","modal_"+me.attr("id"));
            $("#eliminar").parent().show();
            $("#editar").attr("href","sedes/edit/"+me.attr("id"));
            $("#editar").parent().show();
            $('.fixed-action-btn').openFAB();
        }    
           //descheqea los demas
           $( "input" ).not( "#"+ me.attr("id") ).prop('checked', false);

       });

    $( document ).ready(function(){

        //    $("select").val('10');
        $('select').addClass("browser-default");
        $('select').material_select();

    });

</script>
@endsection