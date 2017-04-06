@extends('index')
@section('styles')
<style type="text/css">
.caja{
    width: 35px;
    height: 25px;    
    text-align: center;
    display: table-cell;
    border: 1px solid black;
    letter-spacing: -2px;
}
.a{
    background-color: red;
}
.b{
    background-color: green;
}
.c{
    background-color: yellow;
}
.d{
    background-color: blue;
}
.e{
    background-color: white;
}
</style>
@endsection
@section('content')

<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('microcycle.index') }}" class="breadcrumb">Microciclos</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Microciclos</span>

            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar" title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a></li>                  
                    <li hidden><a id="editar" title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>

                    <li><a id="nuevo" href="{{ route('microcycle.create') }}" title="Nuevo" class="btn-floating waves-effect waves-light btn-large green">   <i class="material-icons">add</i>
                    </a></li> 
                </ul>             
            </div>


            <div class="row">
                <div class="col s12">
                    <table class="datatable responsive-table bordered highlight">
                        <thead>
                            <tr>
                                <th class="center" data-field="options">Elegir</th>
                                <th class="center" data-field="name">Microciclo</th>
                                <th class="center" data-field="name">Experiencia</th>
                                <th class="center" data-field="name">Objetivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($microcycles as $microcycle)
                            <tr>  
                                <td class="opcion center">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="{{ $microcycle->id }}" />
                                        <label for="{{ $microcycle->id }}"></label>
                                    </p>
                                </td>                              
                                <td class="center">
                                    @foreach($microcycle->units as $key=>$unit)
                                        <div class="caja {{ $unit->letter != '-' ? $unit->letter : ' '}}">
                                            {{strtoupper($unit->letter)}} 

                                            @if($unit->level > 0)
                                            {{$unit->level}}
                                            @endif

                                            @if($unit->type_session==1)
                                            <sub>M</sub>
                                            @elseif ($unit->type_session==2)
                                            <sub>C</sub>
                                            @endif
                                            
                                        </div>
                                        @if(($key+1) % 7 == 0  )
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="center">{{ $microcycle->experience->name }}</td>
                                <td class="center">{{ $microcycle->goal->name }}</td>
                            </tr>

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
            $("#editar").attr("href","objetivos/edit/"+me.attr("id"));
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

