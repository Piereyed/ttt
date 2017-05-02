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
                    <a href="{{route('myathletes.index')}}" class="breadcrumb">Mis atletas</a>
                    <a href="#" class="breadcrumb">Rutinas</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Rutinas de {{$person->name}}</span>
            <!-- fixed action buttons -->
            <div class="fixed-action-btn">
                <a id="nuevo" href="#modal1" title="Nueva rutina" class="btn-floating waves-effect waves-light btn-large green"><i class="material-icons">add</i>
                </a>
            </div>             

            <div class="row">
                <div class="col s12">
                    @if(sizeof($programs) > 0  )
                    @foreach($programs as $program)
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>Programa {{$program->number}}</h4></li>
                        @foreach($program->routines as $routine)
                        <li class="collection-item">
                            <div>
                                Rutina {{$routine->number}} - {{$routine->period->name}}
                                <a title="Ver rutina" href="{{route('routine.show',$routine->id)}}" class="secondary-content"><i class="material-icons">visibility</i></a>

                                <!--  cuando termina la rutina-->
                                @if($routine->finished)
                                <a title="Ver resultados" href="{{route('routine_results.show',$routine->id)}}" class="secondary-content"><i class="material-icons">assignment</i></a>
                                <span style="float:inherit" class="blue new badge" data-badge-caption="Terminada"></span>
                                @else
                                <span style="float:inherit" class="green new badge" data-badge-caption="Activa"></span>
                                @endif
                                <!--  fin cuando termina la rutina    -->
                            </div>
                        </li>
                        @endforeach
                        <li class="collection-item" style="text-align:center">
                            <a class="agregar_rutina waves-effect waves-light btn black" href="#modal1" title="Agregar rutina al programa"><i class="material-icons left">add</i>Agregar rutina</a>
                        </li>

                    </ul>
                    @endforeach
                    @else
                    <h5>No hay programas/rutinas registradas</h5>
                    @endif
                </div>
            </div>
        </div>                    
    </div>

</div>

<!-- modal -->
@if($person->experience == null)
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Mensaje</h4>
        <p>No se puede asignar una rutina hasta que se evalúe al atleta.</p>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat">Entendido</a>
    </div>
</div>
@else
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Nueva rutina</h4>
        <div class="row">
            <div class="input-field col m8 offset-m2 s12">     
                <i class="material-icons prefix" >linear_scale</i>                       
                <select id="periodo" name="periodo" required="required" class="validate">
                    <option value="" disabled selected>Seleccione</option>
                    @foreach($person->experience->periods as $period)
                    <option value="{{$period->id}}">{{$period->name}}</option>
                    @endforeach
                </select>
                <label>Periodo</label>
            </div>
        </div>
        <!-- microciclos -->
        <h5>Microciclos</h5>
        <div class="row microciclo_container">
            <table class="responsive-table bordered highlight">
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <a id="crear" href="#" class="waves-effect waves-green btn-flat">Crear</a>
    </div>
</div>
@endif

<form id="formulario" method="post" novalidate="true" class="col s12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
    <input type="hidden" id="exp" name="exp" value="{{ $person->experience->id }}"> 
    <input type="hidden" id="person_id" name="pers" value="{{ $person->id }}"> 
</form>


@endsection



@section('scripts')

<script>
    var aux;
    var nuevo=0;

    $( document ).ready(function(){

        var params = $('#formulario').serialize();
        $("#periodo").on("change",function(){           

            $.ajax({
                type: 'POST',
                url: '/getMicrocycles/' + $(this).val() + '/' + $("#exp").val(),
                data: 'action=search&'+params,
                dataType: 'json',            
                success: function(microcycles) {      
                    //vacio el contenedor
                    $(".microciclo_container tr").remove();                

                    aux = microcycles;                

                    var size = microcycles.length;

                    //el contenido de los units
                    var cad = "";
                    for(var i = 0; i < size; i++){
                        cad+='<tr>   <td class="opcion center">  <p>   <input name="microciclo" value="'+ microcycles[i]['id'] +'" type="radio" class="filled-in" id="'+ microcycles[i]['id'] +'" />                       <label class="label" for="'+ microcycles[i]['id'] +'"></label>           </p>     </td>    <td class="center">';

                        var unit_unit = microcycles[i]['units'].length;
                        for (var j = 0; j < unit_unit; j++) {
                            cad += '<div class="caja ';
                            if(microcycles[i]['units'][j]['letter'] !='-'){
                                cad+=microcycles[i]['units'][j]['letter'];
                            }
                            else{
                                cad+=' ';
                            }
                            cad+='">';
                            cad+= microcycles[i]['units'][j]['letter'].toUpperCase();

                            if(microcycles[i]['units'][j]['level'] > 0 ){
                                cad+=microcycles[i]['units'][j]['level'];
                            }

                            if(microcycles[i]['units'][j]['type_session'] == 1){
                                cad+='<sub>M</sub>';
                            }
                            else if (microcycles[i]['units'][j]['type_session'] == 2) {
                                cad+='<sub>C</sub>';   
                            }

                            cad+='</div>';

                            if( ((j+1) % 7 )== 0){
                                cad+='<br>';
                            }


                        }
                        cad+='</td>   </tr>';
                    }

                    $(".microciclo_container tbody").append(cad);

                },
                error: function(data) {
                    alert("Error al recuperar los objetivos.")
                }
            });


        });
        $('#nuevo').on("click",function(){
            nuevo = 1;
        });

        $('.agregar_rutina').on("click",function(){
            nuevo = 0;
        });



        $('tbody').on("click",'input',function(){ 

            var m = $('input[name="microciclo"]:checked').val();
            var p = $("#periodo").val();
            var id = $("#person_id").val();
            $("#crear").attr('href','/rutinas/create/'+id+'/'+p+'/'+m+'/'+nuevo);           

        });

    });



</script>
@endsection