@extends('index')
@section('content')

<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('local.index') }}" class="breadcrumb">Sedes</a>                    
                    <a href="#" class="breadcrumb">Editar sede</a>   
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
        <span class="h1">Editar sede</span>
            <div class="row">
                <form id="crear_sede" action="{{ route('local.update',$local->id) }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class="fa fa-building prefix" aria-hidden="true"></i>
                            <input id="nombre" name="nombre" value="{{ $local->name }}" type="text" class="validate" data-length="100">
                            <label class="active" for="nombre">Sede</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="fa fa-map-marker prefix" aria-hidden="true"></i>                            
                            <input id="direccion" type="text" name="direccion" value="{{ $local->address }}" class="validate" data-length="500">
                            <label class="active" for="direccion">Dirección</label>
                        </div>

                    </div>
                    
                    <br>

                    <div class="row" style="text-align:center">
                        <div class="cos s12" >
                            <a href="{{ route('local.index') }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
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
        $("#crear_sede").validate({
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
                    required: "Debe ingresar el nombre de la sede",
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

