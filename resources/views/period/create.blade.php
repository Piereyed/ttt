@extends('index')
@section('content')

<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('period.index') }}" class="breadcrumb">Periodos</a>
                    <a href="#!" class="breadcrumb">Nuevo</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nuevo periodo</span>
            <div class="row">
                <form id="crear_periodo" action="{{ route('period.store') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col m4 offset-m2 s12">
                            <i class="material-icons prefix" >border_color</i>
                            <input id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" class="validate" data-length="100">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field col m4 s12">     
                            <i class="material-icons prefix" >grade</i>                       
                            <select id="experiencia" name="experiencia[]" required="required" multiple class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($experiences as $experience)
                                <option value="{{$experience->id}}">{{$experience->name}}</option>
                                @endforeach
                            </select>
                            <label>Experiencia</label>
                        </div>

                        <div class="input-field col m8 offset-m2 s12">     
                            <i class="material-icons prefix" >gps_fixed</i>                       
                            <select id="objetivo" name="objetivo[]" required="required" multiple class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($goals as $goal)
                                <option value="{{$goal->id}}">{{$goal->name}}</option>
                                @endforeach
                            </select>
                            <label>Objetivo</label>
                        </div>

                        
                        

                    </div>
                    
                    <br>

                    <div class="row" style="text-align:center">
                        <div class="cos s12" >
                            <a href="{{ route('period.index') }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
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
@endsection

@section('scripts')
<script>
    $( document ).ready(function(){

        //validate
        $("#crear_periodo").validate({
            rules:{
                nombre:{
                    required:true,
                    maxlength:100
                },
                direccion:{
                    required:true,
                    maxlength:500
                }
            },
            messages:{
                nombre: {
                    required: "Debe ingresar el nombre de la periodo",
                    maxlength: "Sobrepasa el tamaño máximo"
                },            
                direccion:{
                    required: "Debe ingresar la dirección",
                    maxlength:"Sobrepasa el tamaño máximo"
                }
            },
            errorClass: 'invalid',
            errorPlacement: function (error, element) {
                element.next("label").attr("data-error", error.contents().text());
            }
        });
        //fin validate

    });

</script>

@endsection

