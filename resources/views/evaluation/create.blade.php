@extends('index')
@section('styles')
<style>
    tbody tr{
        display: none ;
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
                    <a href="{{ route('myathletes.index') }}" class="breadcrumb">Mis atletas</a>
                    <a href="{{ route('evaluation.index',$client->id) }}" class="breadcrumb">Evaluaciones</a>
                    <a href="#" class="breadcrumb">Nueva</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nueva evaluación</span>
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="{{ asset('storage/'.$client->photo)  }}" alt="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="circle">
                            <span class="title">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>


                            <!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
                        </li>
                    </ul>
                </div>
                <form id="evaluar" files="true"  action="{{ route('evaluation.store',$client->id) }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- experiencia -->
                    <div class="row">
                        @if($client->experience_id != null)

                        <div class="input-field col s4 offset-s2 m4 offset-m1">
                            <i class="material-icons prefix">grade</i>
                            <select id="experiencia" name="experiencia" required="required" class="validate">
                                <option value="" disabled >Seleccione el nivel de experiencia</option>
                                @foreach($experiences as $experience)                            
                                <option @if($experience->id==$client->experience_id) selected @endif value="{{$experience->id}}">{{$experience->name}}</option>
                                @endforeach
                            </select>
                            <label>Experiencia</label>
                        </div>

                        @else

                        <div class="input-field col s4 offset-s2 m4 offset-m1">
                            <i class="material-icons prefix">grade</i>
                            <select id="experiencia" name="experiencia" required="required" class="validate">
                                <option value="" disabled selected>Seleccione el nivel de experiencia</option>
                                @foreach($experiences as $experience)
                                <option value="{{$experience->id}}">{{$experience->name}}</option>
                                @endforeach
                            </select>
                            <label>Experiencia</label>
                        </div>

                        @endif
                        @if($client->goal_id != null)
                        <!-- Objetivo -->
                        <div class="input-field col s4 offset-s2 m4 offset-m2">
                            <i class="material-icons prefix">gps_fixed</i>
                            <select id="objetivo" name="objetivo" required="required" class="validate">
                                <option value="" disabled selected>Seleccione el objetivo deseado</option>
                                @foreach($client->experience->goals as $goal)
                                <option @if($goal->id==$client->goal_id) selected @endif value="{{$goal->id}}">{{$goal->name}}</option>
                                @endforeach
                            </select>
                            <label>Objetivo</label>
                        </div>
                        @else
                        <!-- Objetivo -->
                        <div class="input-field col s4 offset-s2 m4 offset-m2">
                            <i class="material-icons prefix">gps_fixed</i>
                            <select id="objetivo" name="objetivo" required="required" class="validate">
                                <option value="" disabled selected>Seleccione el objetivo deseado</option>
                            </select>
                            <label>Objetivo</label>
                        </div>
                        @endif


                    </div>


                    <!-- medidas -->
                    <div class="row">
                        @foreach($measures as $measure)

                        <div class="input-field col s6 m2">
                            <input id="{{$measure->label}}" type="text" value="{{old($measure->label)}}" name="{{$measure->label}}" placeholder="" class="measure center" @if($measure->id>=14) readonly @endif>
                            <label class="active" for="{{$measure->label}}">{{$measure->name}} @if($measure->unity != '-')({{$measure->unity}}) @endif</label>
                        </div>     

                        @endforeach
                    </div>
                    <!--                    imc-->
                    <div class="row">
                        <div class="col s12">
                            <table class="responsive-table bordered">
                                <thead>
                                    <tr>
                                        <th class="center">Calificación</th>
                                        <th class="center">IMC</th>
                                        <th class="">Riesgos para la salud</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <tr class="grey lighten-1" >
                                        <td class="center">Infrapeso</td>
                                        <td class="center">Menor de 16</td>
                                        <td class="">Dolencias pulmonares</td>
                                    </tr>
                                    <tr class="purple lighten-1">
                                        <td class="center">Delgadez</td>
                                        <td class="center">16 a 18.5</td>
                                        <td class="">Sin riesgo pero con precaución de no adelgazar más</td>
                                    </tr>
                                    <tr class="green lighten-1">
                                        <td class="center">Normal</td>
                                        <td class="center">18.5 a 25</td>
                                        <td class="">Estado saludable. Buen nivel de energía, vitalidad y buena condición física.</td>
                                    </tr>
                                    <tr class="blue lighten-1">
                                        <td class="center">Sobrepeso</td>
                                        <td class="center">25 a 26</td>
                                        <td class="">Sin riesgo pero con precaución de no engordar más</td>
                                    </tr>
                                    <tr class="yellow lighten-1">
                                        <td class="center">Obesidad Tipo I</td>
                                        <td class="center">26 a 30</td>
                                        <td class="">Sobrecarga de articulaciones, cansancio exesivo y cierto riesgo de enfermedades cardiovasculares</td>
                                    </tr>
                                    <tr class="pink lighten-1">
                                        <td class="center">Obesidad Tipo II</td>
                                        <td class="center">30 a 35</td>
                                        <td class="">Problemas cardiacos, diabetes, hipertensión, problemas articulares, rodilla, columna, enfermedad a la vesícula y algunos cánceres.</td>
                                    </tr >
                                    <tr class="orange lighten-1">
                                        <td class="center">Obesidad Tipo III</td>
                                        <td class="center">35 a 40</td>
                                        <td class="">Serios riesgos para la salud, disminución de la calidad de vida. Visita a un médico. Infarto, embolias, angina de pecho, tromboflebitis, etc.</td>
                                    </tr>
                                    <tr class="red lighten-1">
                                        <td class="center">Obesidad Mórbida</td>
                                        <td class="center">Mayor de 40</td>
                                        <td class="">Riesgo inmediato. Requiere tratamiento farmacológico o quirúrgico. Falta de aire, somnolencia, reflujo esofágico, trombosis pulmonar, etc.</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--                    icc-->
                    <div class="row">
                        <div class="col s12">
                            <table class="responsive-table bordered tabla-icc">
                                <thead>
                                    <tr>
                                        <th class="center">Calificación</th>
                                        <th class="center">ICC</th>
                                        <th class="">Riesgos para la salud</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <tr class="green mujer lighten-1" >
                                        <td class="center">Normal</td>
                                        <td class="center">Hasta 0.8</td>
                                        <td class="">Normal en mujeres</td>
                                    </tr>

                                    <tr class="green hombre lighten-1" >
                                        <td class="center">Normal</td>
                                        <td class="center">Hasta 1</td>
                                        <td class="">Normal en hombres</td>
                                    </tr>

                                    <tr class="red mujer lighten-1" >
                                        <td class="center">Obesidad abdominovisceral</td>
                                        <td class="center">Más de 0.8</td>
                                        <td class="">Riesgo cardiovascular aumentado. Probabilidad de contraer enfermedades como Diabetes Mellitus e Hipertensión Arterial.</td>
                                    </tr>

                                    <tr class="red hombre lighten-1" >
                                        <td class="center">Obesidad abdominovisceral</td>
                                        <td class="center">Más de 1</td>
                                        <td class="">Riesgo cardiovascular aumentado. Probabilidad de contraer enfermedades como Diabetes Mellitus e Hipertensión Arterial.</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row"  style="text-align:center">
                        <div class="col s12">
                            <a href="{{ route('evaluation.index',$client->id) }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
                                <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                            </a>
                            <button  title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
                                <i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar
                            </button >
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>



</div>

<form id="formulario" method="post" novalidate="true" class="col s12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
</form>


@endsection

@section('scripts')
<script>
    $("#porcentajeGrasa").on("change",function (){
        cintura = $("#cintura").val();
        cadera = $("#cadera").val() ;
        peso = $("#peso").val();
        talla = $("#talla").val();
        porcgrasa = $("#porcentajeGrasa").val();
        porcmasa = $("#porcentajeMasaMagra").val();


        $("#grasa").val( porcgrasa * peso /100);
        $("#porcentajeMasaMagra").val( 100 - porcgrasa  );
        $("#masaMagra").val(          (100 -  porcgrasa) * peso /100 );
        $("#imc").val( Math.round(peso / (talla/100 * talla/100 )*100)/100               );
        $("#icc").val( Math.round( cintura / cadera *100)/100);
        $("#ica").val( Math.round( cintura / talla * 100)/100);

        //verificar IMC
        var imc_f = parseFloat($("#imc").val());
        if( imc_f < 16 ){            
            $("tbody tr").hide;
            $(".grey").css("display","table-row");
        }
        else if(imc_f <= 18.5){
            $("tbody tr").hide;
            $(".purple").css("display","table-row  ");
        }
        else if(imc_f <= 25){
            $("tbody tr").hide;
            $(".green").css("display","table-row  ");
        }
        else if(imc_f <= 26){
            $("tbody tr").hide;
            $(".blue").css("display","table-row  ");
        }
        else if(imc_f <= 30){
            $("tbody tr").hide;
            $(".yellow").css("display","table-row  ");
        }
        else if(imc_f <= 35){
            $("tbody tr").hide;
            $(".pink").css("display","table-row  ");
        }
        else if(imc_f <= 40){
            $("tbody tr").hide;
            $(".orange").css("display","table-row  ");
        }
        else{
            $("tbody tr").hide;
            $(".red").css("display","table-row  ");
        }

        //verificar ICC
        var icc_f = parseFloat($("#icc").val());

        var sexo = '{{$client->sex}}';

        if(sexo == 'H'){
            if(icc_f > 1){
                $(".tabla-icc tbody tr").hide;
                $(".hombre.red").css("display","table-row");
            }
            else{
                $(".tabla-icc tbody tr").hide;
                $(".hombre.green").css("display","table-row");
            }

        }
        else{//mujer
            if(icc_f > 0.8){
                $(".tabla-icc tbody tr").hide;
                $(".hombre.red").css("display","table-row");
            }
            else{
                $(".tabla-icc tbody tr").hide;
                $(".hombre.green").css("display","table-row");
            }
        }


    });

    var params = $('#formulario').serialize();
    $("#experiencia").on("change",function (){

        $.ajax({
            type: 'POST',
            url: '/getGoals/' + $(this).val(),
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(goals) {      

                //vacio el select          
                $('#objetivo option').remove();
                $("#objetivo").append('<option value="" disabled selected>Seleccione</option>');
                $('#objetivo').material_select('');
                //llenar el select de zonas
                var size = goals.length;                
                for(var i = 0; i < size; i++){
                    $("#objetivo").append($('<option>', {
                        value: goals[i]['id'],
                        text: goals[i]['name']
                    }));
                }

                $('#objetivo').material_select();
            },
            error: function(data) {
                alert("Error al recuperar los objetivos.")
            }
        });

    });





</script>
@endsection

