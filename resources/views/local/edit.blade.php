@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <div class="col m12">
            <h1>Editar sede</h1>
            <div class="row">
                <form id="crear_sede" action="{{ route('local.update',$local->id) }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <i class="fa fa-building prefix" aria-hidden="true"></i>
                            <input id="name" name="name" value="{{ $local->name }}" type="text" class="validate" data-length="100">
                            <label class="active" for="name">Sede</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="fa fa-map-marker prefix" aria-hidden="true"></i>                            
                            <input id="address" type="text" name="address" value="{{ $local->address }}" class="validate" data-length="500">
                            <label class="active" for="address">Dirección</label>
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
                name:{
                    required:true,
                    maxlength:100
                },
                address:{
                    required:true,
                    maxlength:500
                }
            },
            messages:{
                name: {
                    required: "Debe ingresar el nombre de la sede",
                    maxlength: "Sobrepasa el tamaño máximo"
                },            
                address:{
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

