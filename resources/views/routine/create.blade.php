@extends('index')

@section('styles')
<style type="text/css">
    input{
        text-align: center;;
    }
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
        background-color: purple;
    }
    .blanco{
        background-color: white !important;
        border: 1px solid white !important;
        color: white !important;
    }
    .container_tabs{
        border: 2px black solid;
    }
    .container_musculos_index{
        background-color: rgba(0,0,0,0.2);
        /*border: 1px solid red;*/
    }
    .target{
        margin-bottom: 20px;
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
                    <a href="#!" class="breadcrumb">Rutinas</a>
                    <a href="#!" class="breadcrumb">Nueva</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Nueva rutina</span>                   

            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="{{ asset('storage/'.$client->photo)  }}" alt="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="circle">
                            <div class="col s12 m6">
                                <span class="title">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>
                                <p><strong>Experiencia: </strong>{{$client->experience->name}}</p>
                                <p><strong>Objetivo general: </strong>{{$client->goal->name}}</p>
                            </div>
                            <div class="col s12 m6">
                                <p><strong>Periodo: </strong>{{$period->name}}</p>
                                <p><strong>Objetivo del periodo: </strong>{{$period->specific_goal}}</p>
                                <strong>Microciclo: </strong>
                                <div style="display: initial;" class="center">
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
                                </div>
                                <p><strong>Cantidad de entrenamientos: </strong>{{sizeof($arrLetters)}}</p>
                                <p><strong>Sesiones por microciclo: </strong>{{sizeof($microcycle->sessions())}}</p>
                            </div>                           
                        </li>
                    </ul>
                </div>

            </div>

            <form id="crear" method="post" action="{{ route('routine.store') }}" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                <input type="hidden" name="person_id" value="{{ $client->id }}">    
                <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">    
                <input type="hidden" name="period_id" value="{{ $period->id }}">    
                <input type="hidden" name="goal_id" value="{{ $client->goal->id }}">    
                <input type="hidden" id="total_sesiones" name="total_sessions" value="">    
                <input type="hidden" id="sesiones" value="{{ sizeof($microcycle->sessions()) }}">    



                <div class="row">
                    <div class="col s12 cronograma">
                        <div class="input-field">     
                            <i class="material-icons prefix" >autorenew</i>                       
                            <select id="duracion" name="duracion" class="validate">
                                <option selected disabled value="">Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <label>Cantidad de microciclos</label>
                        </div>

                        <div class="center">
                            <p style="text-align: center;" >Cantidad de semanas: <span id="num_semanas"></span></p>
                            <p style="text-align: center;">Cantidad de sesiones: <span id="num_sesiones"></span></p>
                        </div>
                    </div>
                </div>




                <!-- las rutinas en tabs -->
                <div class="row container_tabs">
                    <div class="col s12">
                        <ul class="tabs">
                            @foreach($arrLetters as $key => $letter)
                            <li class="tab col s3"><a href="#{{strtoupper($letter)}}">Entrenamiento {{strtoupper($letter)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @foreach($arrLetters as $key => $letter)
                    <div id="{{strtoupper($letter)}}" class="entrenamiento col s12">
                        <div class="col m6 s12 input-field">         
                            <select id="tipo_sesion" name="tipo_sesion[]" required="required" class="validate">
                                <option @if($arr_type[$key]==1) selected @endif value="1">Musculación</option>
                                <option @if($arr_type[$key]==2) selected @endif value="2">Cardiovascular</option>
                            </select>
                            <label>Tipo de sesión</label>
                        </div>

                        <div class="col m6 s12 input-field">     
                            <i class="material-icons prefix" >query_builder</i> 
                            <input type="number" name="descanso" value="{{$period->rest_duration}}" required="required" class="validate">
                            <label>Descanso entre series (segundos)</label>
                        </div>

                        <!-- <div class="input-field col m6 s12">     
<i class="material-icons prefix" >accessibility</i>                       
<select id="musculo" name="musculo" required="required" multiple class="validate">
<option value="" disabled selected>Seleccione</option>
@foreach($muscles as $muscle)
<option value="{{$muscle->id}}">{{$muscle->name}}</option>
@endforeach
</select>
<label>Músculos</label>
</div> --> 

                        <!-- calentamiento -->
                        <div class="row calentamiento">
                            <div class="col s12">
                                <h4>Calentamiento</h4>
                            </div>

                            <div class="col m12 s12 input-field">     
                                <i class="material-icons prefix" >query_builder</i> 
                                <!-- <input type="number" name="duracion_calentamiento" value="{{$phases[0]->max_duration}}" required="required" class="validate"> -->
                                <select id="duracion_calentamiento" name="duracion_calentamiento"  required="required" class="validate">
                                    <option value="" disabled selected>Seleccione</option>                
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option selected value="5">5</option>
                                </select>
                                <label>Tiempo(minutos)</label>
                            </div>

                            <!-- <div class="col s12 center">
<a href="#modal" class="modal-trigger btn waves-effect waves-light"><i class="material-icons left">add</i>Agregar ejercicio</a>
</div> -->

                            <!-- tabla -->
                            <div id="tabla_calentamiento" class="col s12">

                            </div>

                        </div>

                        <!-- estiramiento -->
                        <div class="row estiramiento">
                            <div class="col s12">
                                <h4>Estiramiento</h4>    
                            </div>


                            <div class="col m12 s12 input-field">     
                                <i class="material-icons prefix" >query_builder</i> 
                                <input type="number" name="duracion_calentamiento" value="{{$phases[2]->max_duration}}" required="required" class="validate">
                                <label>Tiempo(minutos)</label>
                            </div>

                            <!-- <div class="col s12 center">
<a href="#modal" class="modal-trigger btn waves-effect waves-light"><i class="material-icons left">add</i>Agregar ejercicio</a>
</div> -->
                        </div>
                        <!--fin de estiramiento-->

                        <!-- principal -->
                        <div class="row principal">
                            <div class="col s12">
                                <h4>Principal</h4>   
                            </div>
                            <div class="target col s12">
                                <table class="responsive-table bordered highlight" name="table-objs">
                                    <thead>
                                        <tr>
                                            <th class="center" data-field="options">Quitar</th>
                                            <th class="center" data-field="type">Tipo</th>
                                            <th class="center" data-field="muscle">Músculo</th>
                                            <th data-field="name">Nombre</th>
                                            <th class="center" data-field="name">Series</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col s12 center">
                                <a href="#modal" class="btn-agregar-ejercicio modal-trigger btn waves-effect waves-light"><i class="material-icons left">add</i>Agregar ejercicio</a>
                            </div>
                        </div>
                        <!-- fin de principal-->



                    </div>
                    @endforeach
                </div>
                <!-- fin rutinas en tabs -->

                <!-- musculos indice -->
                <div class="row container_musculos_index">
                    <div class="col s12 center">
                        <h5>Músculos</h5>   
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/hombros.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="1" />
                                    <label>Hombro</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/pecho.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="5" />
                                    <label>Pecho</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/espalda.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="6" />
                                    <label>Espalda</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/biceps.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="2" />
                                    <label>Bícep</label>
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/triceps.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="3" />
                                    <label>Trícep</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/antebrazo.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="4" />
                                    <label>Antebrazo</label>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- fila2 -->

                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/abdominales.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="7" />
                                    <label>Abdominales</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/cuadriceps.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="9" />
                                    <label>Cuádricep</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/femoral.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="12" />
                                    <label>Femoral</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/aductores.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="11" />
                                    <label>Aductor</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/abductores.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="10" />
                                    <label>Abductor</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/gemelos.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="13" />
                                    <label>Gemelos</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- fila3 -->
                    <div class="col s4 m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('storage/fotos_musculos/trasero.jpg')  }}">
                            </div>
                            <div class="card-content">
                                <p>
                                    <input type="checkbox" class="filled-in" id="8" />
                                    <label>Glúteos</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin index musculos -->

                <div class="row" style="text-align:center">
                    <div class="cos s12" >
                        <a href="{{ route('microcycle.index') }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
                            <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                        </a>
                        <button  title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
                            <i class="right fa fa-floppy-o" aria-hidden="true"></i>Guardar
                        </button >
                    </div>
                </div>
            </form>
            <!-- fin de crear-->
        </div>                    
    </div>

</div>


<form id="formulario" method="post" novalidate="true" class="col s12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
    <input type="hidden" id="microcycle_id" name="microcycle_id" value="{{ $microcycle->id }}"> 
    <input type="hidden" id="period_id" name="period_id" value="{{ $period->id }}"> 
</form>

<form id="pedir_ejercicios_calentamiento" method="post" action="{{ route('exercise.obtain_warm') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<!-- modal -->
<div id="modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Agregar Ejercicio</h4>
        <form id="pedir_ejercicios" method="POST" action="{{ route('exercise.obtain') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

            <div class="row ejer_box">
                <div class="input-field col m4 offset-m4 s12">            
                    <select id="tipo_ejercicio" name="tipo_ejercicio" required="required" class="validate">
                        <option value="" disabled selected>Seleccione</option>                
                        <option value="1">Simple</option>                
                        @if($client->experience->id >= 2)
                        <option value="2">Compuesta</option>
                        <option value="3">Superserie</option>
                        @endif
                        @if($client->experience->id == 3)
                        <option value="4">Triserie</option>
                        <option value="5">Gigante</option>                
                        @endif
                    </select>
                    <label>Tipo</label>
                </div>

                <!-- simple o compuesto-->
                <div id="select_simple_compuesto" hidden class="select_fugaz input-field col m4 offset-m4 s12">     
                    <i class="material-icons prefix" >accessibility</i>                       
                    <select id="musculo1" name="musculo1" required="required" class="validate">
                        <option value="" disabled selected>Seleccione</option>
                        @foreach($muscles as $muscle)
                        <option value="{{$muscle->id}}">{{$muscle->name}}</option>
                        @endforeach
                    </select>
                    <label>Músculo</label>
                </div> 
                <!-- fin simple o compuesto -->

                <!-- superserie-->
                <div id="select_superserie1" hidden class="select_fugaz input-field col m4 offset-m2 s12">     
                    <i class="material-icons prefix" >accessibility</i>                       
                    <select id="musculo2" name="musculo2" required="required" class="validate">
                        <option value="" disabled selected>Seleccione</option>
                        @foreach($muscles as $muscle)
                        <option value="{{$muscle->id}}">{{$muscle->name}}</option>
                        @endforeach
                    </select>
                    <label>Músculo 1</label>
                </div> 
                <div id="select_superserie2" hidden class="select_fugaz input-field col m4 s12">     
                    <i class="material-icons prefix" >accessibility</i>                       
                    <select id="musculo3" name="musculo3" required="required" class="validate">
                        <option value="" disabled selected>Seleccione</option>

                    </select>
                    <label>Músculo 2</label>
                </div> 
                <!-- fin superserie -->


            </div> 

            <div id="table-exercises" class="row">
                <!-- aca entrara la tabla por ajax -->

            </div>  

        </form>
    </div>
    <div class="modal-footer">
        <a id="btn-agregar" class="modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons left" >add</i>Agregar</a>
    </div>
</div>


@endsection



@section('scripts')

<script>
    var aux_microciclo;
    var aux_periodo;
    var entrenamiento;

    $( document ).ready(function(){


        var params = $('#formulario').serialize();

        //pedir el microciclo
        $.ajax({
            type: 'POST',
            url: '/getMicrocycle/' + $("#microcycle_id").val(),
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(microcycle) {      
                aux_microciclo = microcycle;
            },
            error: function(data) {
                alert("Error al recuperar el microciclo.")
            }
        });
        
        //pedir la piramide del periodo
        $.ajax({
            type: 'POST',
            url: '/getPeriod/' + $("#period_id").val(),
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(period) {      
                aux_periodo = period;
            },
            error: function(data) {
                alert("Error al recuperar el periodo.")
            }
        });

        // mostrar las sesiones graficamente segun duracion de microciclos
        $("#duracion").on("change",function(){
            $("#total_sesiones").val($(this).val() * $("#sesiones").val());
            $("#num_sesiones").html($(this).val() * $("#sesiones").val());
            $(".cronograma .center .caja").remove();
            $(".cronograma br").remove();

            var cad="";
            var size=aux_microciclo['units'].length ;
            var sizetotal=aux_microciclo['units'].length * $(this).val() ;

            var count =0;
            for (var i = 0; i < $(this).val() ; i++) {

                for (var j =0; j < size; j++) {
                    cad += '<div style="display:inline-block !important" class="caja ';
                    if(aux_microciclo['units'][j]['letter'] !='-'){
                        cad+=aux_microciclo['units'][j]['letter'];
                    }
                    else{
                        cad+=' ';
                    }
                    cad+='">';
                    cad+= aux_microciclo['units'][j]['letter'].toUpperCase();

                    if(aux_microciclo['units'][j]['level'] > 0 ){
                        cad+=aux_microciclo['units'][j]['level'];
                    }
                    if(aux_microciclo['units'][j]['type_session'] == 1){
                        cad+='<sub>M</sub>';
                    }
                    else if (aux_microciclo['units'][j]['type_session'] == 2) {
                        cad+='<sub>C</sub>';   
                    }
                    cad+='</div>';
                    if( ((count+1) % 7 )== 0){
                        cad+='<br>';
                    }
                    count++;
                }
            }
            //agregar lo que falta
            if((count % 7 )> 0){
                for (var k =0; k < (7-(count % 7)); k++) {
                    cad+='<div style="display:inline-block !important" class="caja blanco">-</div>';
                }
            }
            $(".cronograma .center").append(cad);
            $("#num_semanas").html(Math.ceil((sizetotal/7)));
        });

        // muestra el tipo de ejercicio : simple superserie etc
        $("#tipo_ejercicio").on("change",function(){
            $(".select_fugaz").hide();

            if($(this).val() <=2){
                $("#select_simple_compuesto").show();

            }
            else if($(this).val() == 3){ //superserie
                $("#select_superserie1").show();
                $("#select_superserie2").show();                

            }
            else if($(this).val() == 4){ //triserie

            }
            else if($(this).val() == 5){ //gigante

            }
        });

        //ajax para imprimir los ejercicios de calentamiento
        form = $("#pedir_ejercicios_calentamiento");
        var data = form.serialize();
        $.post(form.attr('action'), data, function(table) {
            $('#tabla_calentamiento').html(table);
        });


        //ajax para pedir ejercicios segun el musculo
        $("#musculo1").on("change",function(){
            //pedir ejercicios
            form = $("#pedir_ejercicios");
            var data = form.serialize();
            $.post(form.attr('action'), data, function(table) {
                $('#table-exercises').html(table);
            });
        });

        // agregar los ejercicios a principal
        $("#btn-agregar").on("click", function(){
            $(".elegido").each( function( index, tr ) {
                new_tr = tr;
                $(this).find('input').prop('checked', false);
                $(this).find('.opc').remove();
                $(this).children('.hidden').each(function(){
                    $(this).css("display","table-cell");
                });
                
                //armo la cadena
                cad = '<td class="center">';
                var i;
                for(i=0; i < aux_periodo['pyramids'].length - 1; i++){
                    repeticion = aux_periodo['pyramids'][i]['percentage_rm'] ;
                    cad+=repeticion + ', ';
                }
                
                repeticion = aux_periodo['pyramids'][aux_periodo['pyramids'].length - 1]['percentage_rm'] ;
                cad+=repeticion +'';
                
                cad += '</td>';
                $(this).append(cad);
                $("#"+entrenamiento+" .target tbody").append(tr);
            });
        });

        $(".btn-agregar-ejercicio").on("click", function(){
            entrenamiento = $(this).parents("div.entrenamiento:first").attr("id");
        });




    });

</script>
@endsection