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
                <div class="col s12 m6">
                    <ul class="collection">
                        <li class="collection-item avatar">
                          <img src="{{ asset('storage/'.$client->photo)  }}" alt="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="circle">
                          <span class="title">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>
                          <p><strong>Experiencia: </strong>{{$client->experience->name}}</p>
                          <p><strong>Objetivo general: </strong>{{$client->goal->name}}</p>
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


                        <!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
                    </li>
                </ul>
            </div>
            <div class="col s12 m6 cronograma">
                <div class="input-field">     
                    <i class="material-icons prefix" >autorenew</i>                       
                    <select id="duracion" name="duracion" required="required" class="validate">
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
                    <p>Cantidad de semanas: <span id="num_semanas"></span></p>
                    
                </div>

            </div>
        </div>

        <div class="row">
            @foreach($arrLetters as $letter)
            <h4>Entrenamiento {{strtoupper($letter)}}</h4>
            @endforeach
        </div>
    </div>                    
</div>

</div>


<form id="formulario" method="post" novalidate="true" class="col s12">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">    
 <input type="hidden" id="microcycle_id" name="microcycle_id" value="{{ $microcycle->id }}"> 
</form>


@endsection



@section('scripts')

<script>
    var aux_microciclo;
    
    $( document ).ready(function(){


        var params = $('#formulario').serialize();
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


        $("#duracion").on("change",function(){
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
    });

</script>
@endsection