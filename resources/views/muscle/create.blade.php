@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('muscle.index') }}" class="breadcrumb">Músculos</a>
                    <a href="#!" class="breadcrumb">Nuevo</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col s12">
            <span class="h1">Nuevo músculo</span>
            <div class="row">
                <form id="crear_musculo" action="{{ route('muscle.store') }}" files="true" enctype="multipart/form-data" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col s12 offset-m4 m4">                            
                            <input id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" class="validate" data-length="100">
                            <label for="name">Nombre</label>
                        </div>

                        <div class="input-field col s12 offset-m4 m4">
                            <select id="categoria" name="categoria" required="required" class="validate">
                                <option value="" disabled selected>Elije la categoría</option>
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            <label for="categoria">Categoría</label>                            
                        </div>

                        <div class="col s12">
                            <span class="h2">Zonas</span><hr>
                        </div>
                        <!-- botones de agregar y quitar -->
                        <div class="col s12" style="text-align: center;">
                            <div class="row">
                                <a id="add" class="waves-effect waves-light btn green"><i class="material-icons left">add</i>Agregar</a>
                                <a id="remove" class="waves-effect waves-light btn red"><i class="material-icons left">delete</i>Quitar</a>
                            </div>                            
                        </div>

                        <!-- tabla -->
                        <div class="col s12">
                            <table class="responsive-table bordered highlight">
                                <thead>
                                    <tr>
                                        <th class="center" data-field="options">Elegir</th>
                                        <th class="center" data-field="name">Nombre</th>
                                        <th data-field="lastname1">Foto (opcional)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>

                    <div class="row" style="text-align:center">
                        <div class="cos s12" >
                            <a href="{{ route('muscle.index') }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
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
    var n = 0;
    $( document ).ready(function(){
        $.validator.setDefaults({
            ignore: []
        });

        //validate
        $("#crear_musculo").validate({
            rules:{
                nombre:{
                    required:true,
                    maxlength:100
                },
                categoria:{
                    required:true                    
                }
                
            },
            messages:{
                nombre: {
                    required: "Debe ingresar el nombre del músculo",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                categoria: {
                    required: "Debe elegir la categoría del músculo"                    
                }            
                
            },
            errorClass: 'invalid',
            errorPlacement: function (error, element) {
                element.next("label").attr("data-error", error.contents().text());
            }
        });
        //fin validate


        $("#add").on("click",function(){
            n++;  

            $("tbody").append('<tr><td class="opcion center"><p><input type="checkbox" class="filled-in" id="'+n+'"/><label for="'+n+'"></label></p></td><td><input type="text" name="nombrezona['+n+']" /></td><td><input id="foto"'+n+' type="file" name="fotozona['+n+']" class="dropify" data-max-file-size="3M" data-height="80"  data-allowed-file-extensions="png jpg jpeg" /></td></tr>');
            $('.dropify').dropify();
        });

        $("#remove").on("click",function(){
            var c = $(".opcion input[type=checkbox]");
            if(c.length==0)
                toastr.warning('Agrege una zona primero');
            else if($(".opcion input[type=checkbox]:checked").length == 0)
                toastr.warning('Seleccione una zona primero');
            else
                $(".opcion input[type=checkbox]:checked").each(function(i,e){                   
                    $(this).parent().parent().parent().remove();
                });
        });

        
        



    });






</script>
@endsection

