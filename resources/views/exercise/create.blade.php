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
                <form id="crear_ejercicio" action="{{ route('exercise.store') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col s12">                            
                            <input id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" class="validate" data-length="100">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12">                            
                            <textarea  id="descripcion" name="descripcion" value="{{ old('descripcion') }}" type="text" class="validate materialize-textarea" data-length="1000"></textarea>
                            <label for="descripcion">Descripción</label>
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
@endsection

@section('scripts')
<script>
    $( document ).ready(function(){

        //validate
        $("#crear_ejercicio").validate({
            rules:{
                nombre:{
                    required:true,
                    maxlength:100
                }
                
            },
            messages:{
                nombre: {
                    required: "Debe ingresar el nombre del ejercicio",
                    maxlength: "Sobrepasa el tamaño máximo"
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

