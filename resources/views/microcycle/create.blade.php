@extends('index')
@section('styles')
<style type="text/css">
    input{
        text-align: center;
    }

    .micro{
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
                    <a href="{{ route('microcycle.index') }}" class="breadcrumb">Microciclos</a>
                    <a href="#!" class="breadcrumb">Nuevo</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nuevo microciclo</span>
            <div class="row">
                <form id="crear_microciclo" action="{{ route('microcycle.store') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col m4 offset-m2 s12">     
                            <i class="material-icons prefix" >grade</i>                       
                            <select id="experiencia" name="experiencia" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($experiences as $experience)
                                <option value="{{$experience->id}}">{{$experience->name}}</option>
                                @endforeach
                            </select>
                            <label>Experiencia</label>
                        </div>

                        <div class="input-field col m4  s12">     
                            <i class="material-icons prefix" >gps_fixed</i>                       
                            <select id="objetivo" name="objetivo" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                
                            </select>
                            <label>Objetivo general</label>
                        </div>

                    </div>
                    
                    <div class="row">
                        <p>Ingrese letras mayúsculas <a id="add" class="btn">Agregar</a></p>
                        <!-- dias -->
                        <div class="col offset-s3 center s1">L</div>
                        <div class="col center s1">M</div>
                        <div class="col center s1">M</div>
                        <div class="col center s1">J</div>
                        <div class="col center s1">V</div>
                        <div class="col center s1">S</div>
                        <div class="col center s1">D</div> 
                    </div>
                    <div class="micros row">
                        <div class="micro col offset-s3 center s1">
                            <select name="letra[0]" class="miselect">
                                <option value="descanso" selected>-</option>
                                <option value="a">A</option>
                                <option value="a1">A1</option>
                                <option value="b">B</option>
                                <option value="b1">B1</option>
                                <option value="c">C</option>
                                <option value="c1">C1</option>
                                <option value="d">D</option>
                                <option value="d1">D1</option>
                                <option value="e">E</option>
                                <option value="e1">E1</option>
                            </select>
                            <select name="tipo_sesion[0]" class="miselect">
                                <option value="m" selected>Musc.</option>
                                <option value="c">Card.</option>
                            </select>
                        </div>
                        
                    </div>

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
    var count = 1;
    $( document ).ready(function(){
        
        $('.miselect').addClass("browser-default");
        $('select').material_select();

        $("#add").on("click",function(){
            count++;
            if(count % 7 == 1){
                $(".micros").append('<div class="micro col offset-s3 center s1"><select name="letra['+(count-1)+']" class="miselect">                                <option value="descanso" selected>-</option>                                <option value="a">A</option>                                <option value="a1">A1</option>                                <option value="b">B</option>                                <option value="b1">B1</option>                                <option value="c">C</option>                                <option value="c1">C1</option>                                <option value="d">D</option>                                <option value="d1">D1</option>                                <option value="e">E</option>                                <option value="e1">E1</option>                            </select>                            <select name="tipo_sesion['+(count-1)+']" class="miselect">                                <option value="m" selected>Musc.</option>                                <option value="c">Card.</option>                            </select>                        </div>');
            }
            else{
                $(".micros").append('<div class="micro col center s1"><select name="letra['+(count-1)+']" class="miselect">                                <option value="descanso" selected>-</option>                                <option value="a">A</option>                                <option value="a1">A1</option>                                <option value="b">B</option>                                <option value="b1">B1</option>                                <option value="c">C</option>                                <option value="c1">C1</option>                                <option value="d">D</option>                                <option value="d1">D1</option>                                <option value="e">E</option>                                <option value="e1">E1</option>                            </select>                            <select name="tipo_sesion['+(count-1)+']" class="miselect">                                <option value="m" selected>Musc.</option>                                <option value="c">Card.</option>                            </select>                        </div>');
            }
            $('.miselect').addClass("browser-default");
            $('select').material_select();
            
        });

        var params = $('#formulario').serialize();
        $("#experiencia").on("change",function(){
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



    });

</script>

@endsection

