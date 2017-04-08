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
                    <a href="{{ route('exercise.index') }}" class="breadcrumb">Ejercicios</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Ejercicios</span>
            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar"  title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red "><i class="material-icons">delete</i></a></li>  

                    <li hidden><a id="editar"  title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>

                    <li hidden ><a id="ver"  title="Ver" class="btn-floating btn-large waves-effect waves-light blue "><i class="material-icons">visibility</i></a></li>

                    <li><a id="nuevo" href="{{ route('exercise.create') }}" title="Nuevo" class="btn-floating waves-effect waves-light btn-large green"><i class="material-icons">add</i>
                    </a></li> 
                </ul>             
            </div> 

            

            <div class="row">
                <div class="col s12 m12 l12">
                    <table class="datatable responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="options">Elegir</th>
                                <th data-field="name">Nombre</th>                        
                                <th data-field="type">Tipo</th>                        
                                <th data-field="phase">Phase</th>                        
                                <th class="center" data-field="muscle">Músculo</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($exercises as $exercise)
                            <tr>
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="{{ $exercise->id }}" />
                                        <label for="{{ $exercise->id }}"></label>
                                    </p>
                                </td>
                                <td>{{ $exercise->name }}</td>                        
                                <td class="center">@if($exercise->type == 0) Aaeróbico @else Anaeróbico @endif </td>                        
                                <td class="center">{{$exercise->phase->name}}</td>                        
                                <td class="center">@if($exercise->type == 0) Todos @else {{ $exercise->muscles[0]->name }}@endif</td>
                            </tr>   

                            <!--     modal-->
                            <div id="{{'modal_'.$exercise->id }}" class="modal bottom-sheet">
                                <div class="modal-content">
                                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> CUIDADO</h4>
                                    <p>Está a punto de eliminar este elemento.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('exercise.delete', $exercise->id) }}" class=" modal-action modal-close waves-effect waves-green btn red">ELIMINAR</a>
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
            $("#ver").parent().hide();
            $("#editar").parent().hide();
            $("#eliminar").parent().hide();

        }        
        else{
            me.prop('checked', true);            
            $("#eliminar").attr("data-target","modal_"+me.attr("id"));
            $("#eliminar").parent().show();
            $("#editar").attr("href","ejercicios/edit/"+me.attr("id"));
            $("#editar").parent().show();
            $("#ver").attr("href","ejercicios/show/"+me.attr("id"));
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

    });

</script>
@endsection