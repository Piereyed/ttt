@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('exercise.index') }}" class="breadcrumb">Ejercicios</a>
                    <a href="#!" class="breadcrumb">Nuevo</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col s12">
            <span class="h1">Nuevo ejercicio</span>
            <div class="row">
                <form id="crear_ejercicio" files="true" enctype="multipart/form-data" action="{{ route('exercise.store') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col m4 s12"> 
                            <i class="material-icons prefix" >call_split</i>
                            <select id="tipo" name="tipo" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0">Aeróbico</option>
                                <option value="1">Anaeróbico</option>                                
                            </select>
                            <label>Tipo</label>
                        </div>

                        <div class="input-field col m4 s12">    
                            <i class="material-icons prefix" >timer</i>
                            <select id="fase" name="fase" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($phases as $phase)
                                <option value="{{$phase->id}}">{{$phase->name}}</option>
                                @endforeach
                            </select>
                            <label>Fase</label>
                        </div>

                        <div class="input-field col m4 s12">     
                            <i class="material-icons prefix" >grade</i>                       
                            <select id="experiencia" name="experiencia" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($experiences as $experience)
                                <option value="{{$experience->id}}">{{$experience->name}}</option>
                                @endforeach
                            </select>
                            <label>Experiencia</label>
                        </div>

                        <div class="input-field col s12 m4">        
                            <i class="material-icons prefix">fitness_center</i>                    
                            <input id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" class="validate" data-length="100">
                            <label for="name">Nombre</label>
                        </div>

                        <div class="input-field col m4 s12">         
                            <i class="material-icons prefix">subject</i>                   
                            <textarea  id="descripcion" name="descripcion" type="text" class="validate materialize-textarea" data-length="1000">{{old('descripcion')}}</textarea>
                            <label for="descripcion">Descripción</label>
                        </div> 

                        <div style="min-height: 70px;text-align: center;" class="input-field col m4 s12">

                            <div class="switch">
                                <label style="width: 100%">
                                    Sin peso
                                    <input id="usapeso" name="peso" required="required" type="checkbox">
                                    <span class="lever"></span>
                                    Con peso
                                </label>
                            </div>
                        </div> 

                        <!-- foto -->
                        <label style="display: inline-block;width: 100%" class="active" for="foto">Foto</label>
                        <div class="file-field input-field col s12">
                            <input id="foto" type="file" name="foto" value="{{old('foto')}}" class="dropify" data-max-file-size="3M" data-height="240"  data-allowed-file-extensions="png jpg jpeg" />

                        </div>                        

                        <!-- musculos -->
                        <div class="col s12">
                            <h4>Músculos</h4>                            
                        </div>

                        <!-- musculos -->
                        <div class="ej input-field col m6 offset-m3 s12">     
                            <i class="material-icons prefix" >accessibility</i>                       
                            <select id="musculo" name="musculo[]" required="required" multiple class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($muscles as $muscle)
                                <option value="{{$muscle->id}}">{{$muscle->name}}</option>
                                @endforeach
                            </select>
                            <label>Músculo</label>
                        </div> 

                        <!-- zonas ocultas -->

                        <div id="select_pecho" hidden class="input-field col m6 offset-m3 s12">     
                            <i class="material-icons prefix" >center_focus_weak</i>                       
                            <select id="zona" name="zona_pecho" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($muscles[4]->zones as $zone)
                                <option value="{{$zone->id}}">{{$zone->name}}</option>
                                @endforeach
                            </select>
                            <label>Zona del Pecho</label>
                        </div>

                        <div id="select_espalda" hidden class="input-field col offset-m3 m6 s12">     
                            <i class="material-icons prefix" >center_focus_weak</i>                       
                            <select id="zona" name="zona_espalda" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($muscles[5]->zones as $zone)
                                <option value="{{$zone->id}}">{{$zone->name}}</option>
                                @endforeach
                            </select>
                            <label>Zona de la espalda</label>
                        </div>

                        
                    </div>



                    <br>

                    <div class="row" style="text-align:center">
                        <div class="cos s12" >
                            <a href="{{ route('exercise.index') }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
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
    var ej = 1;
    $( document ).ready(function(){

        //validate
        $("#crear_ejercicio").validate({
            rules:{
                nombre:{
                    required:true,
                    maxlength:100
                },
                descripcion:{
                    required:true,
                    maxlength:1000
                }                
            },
            messages:{
                nombre: {
                    required: "Debe ingresar el nombre del ejercicio",
                    maxlength: "Sobrepasa el tamaño máximo"
                } ,
                descripcion: {
                    required: "Debe ingresar la descripción del ejercicio",
                    maxlength: "Sobrepasa el tamaño máximo"
                }           
                
            },
            errorClass: 'invalid',
            errorPlacement: function (error, element) {
                element.next("label").attr("data-error", error.contents().text());
            }
        });
        //fin validate

        $("#musculo").on("change",function(){
            arr = $(this).val();

            if($.inArray( "5" , arr ) != -1 ){
                $("#select_pecho").show();
            }
            else{
                $("#select_pecho").hide();
            }

            if($.inArray( "6" , arr ) != -1 ){
                $("#select_espalda").show();
            }
            else{
                $("#select_espalda").hide();
            }

        });



    });

</script>
@endsection

