@extends('index')

@section('styles')
<style type="text/css">
    .card{
        cursor: pointer;
        
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
                    <a href="{{ route('client.index') }}" class="breadcrumb">Clientes</a>
                    <a href="#" class="breadcrumb">Nuevo</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nuevo cliente</span>
            <div class="row">
                <form id="crear_cliente" files="true" enctype="multipart/form-data"  action="{{ route('client.store') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col l6 s12">
                            <div class="input-field col s12 m6 l6">
                                <select id="tipo_documento" name="tipo_documento">
                                    <option value="0" selected>DNI</option>
                                    <option value="1">Pasaporte</option>
                                    <option value="2">Carnet de extrajería</option>
                                </select>
                                <label >Tipo de documento</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="fa fa-address-card prefix" aria-hidden="true"></i>
                                <input id="documento" name="documento" minlength="8" maxlength="8" value="{{ old('documento') }}" type="text" class="validate center" data-length="15" >
                                <label class="active" for="documento">N° documento</label>
                            </div>

                            <div class="input-field col l12 m4 s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nombre" name="nombre" value="{{ old('nombre') }}" type="text" class="validate " data-length="100">
                                <label class="active" for="nombre">Nombre</label>
                            </div>
                            <div class="input-field col l12 m4 s12">  
                                <i class="material-icons prefix">xxx</i>                          
                                <input id="apellido_paterno" type="text" value="{{ old('apellido_paterno') }}" name="apellido_paterno" class="validate" data-length="100">
                                <label class="active" for="apellido_paterno">Apellido paterno</label>
                            </div>
                            <div class="input-field col l12 m4 s12">
                                <i class="material-icons prefix">xxx</i>                          
                                <input id="apellido_materno" type="text" value="{{ old('apellido_materno') }}" name="apellido_materno" class="validate" data-length="100">
                                <label class="active" for="apellido_materno">Apellido materno</label>
                            </div>
                        </div>

                        <div class="col l6 s12">

                            <label class="active" for="foto">Foto (opcional)</label>
                            <div class="file-field input-field col s12 m12 l12">
                                <input id="foto" type="file" name="foto" value="{{old('foto')}}" class="dropify" data-max-file-size="3M" data-height="240"  data-allowed-file-extensions="png jpg jpeg" />
                            </div>



                            <div class="col s12 m12 l12" style="text-align:center">
                              <label class="active" for="sexo">Sexo</label>
                              <div class="switch sexswitch">
                                <label>
                                  <i for="male" title="Hombre" class="fa fa-male fa-3x" aria-hidden="true"></i>
                                  <input id="sexo" name="sexo" type="checkbox">
                                  <span class="lever"></span>
                                  <i for="female" title="Mujer" class="fa fa-female fa-3x" aria-hidden="true"></i>
                              </label>
                          </div>
                      </div>
                  </div>




              </div>
              <!-- fin priemra fila -->


              

              <div class="row">
                <div class="input-field col s12 m6">
                    <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate" data-length="100">
                    <label class="active" for="email">Correo electrónico</label>
                </div>
                <div class="input-field col m6 s12">
                    <i class="material-icons prefix">phonelink_ring</i>
                    <input id="telefono" name="telefono" value="{{ old('telefono') }}" type="text" class="validate" data-length="15" >
                    <label class="active" for="telefono">Teléfono</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="fa fa-map-marker prefix" aria-hidden="true"></i>                            
                    <input id="direccion" type="text" name="direccion" value="{{ old('direccion') }}" class="validate" data-length="500">
                    <label class="active" for="direccion">Dirección</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="prefix fa fa-birthday-cake" aria-hidden="true"></i>
                    <input id="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento" class="datepicker">
                    <label class="active" for="fecha_nacimiento" class="">Fecha de nacimiento</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s6">
                    <i class="prefix fa fa-calendar" aria-hidden="true"></i>
                    <input id="dias_de_entrenamiento" type="number" value="{{ old('dias_de_entrenamiento') }}" name="dias_de_entrenamiento">
                    <label class="active" for="dias_de_entrenamiento">Días de entrenamiento</label>
                </div>
                
                <div class="input-field col s6">
                    <i class="prefix fa fa-codepen" aria-hidden="true"></i>
                    <input  id="dias_de_congelamiento" type="number" value="{{ old('dias_de_congelamiento') }}" name="dias_de_congelamiento">
                    <label class="active" for="dias_de_congelamiento">Días de congelamiento</label>
                </div>
            </div>

            <h5>Entrenador</h5>

            <div class="row">
            @foreach($trainers as $trainer)
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="{{ asset('storagee/'.$trainer->photo)  }}">
                      </div>
                      <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">{{$trainer->name.' '.$trainer->lastname1}}</span>
                          <p>Asignados: 3</p>
                          <input class="trainerid" type="tex" hidden value="{{$trainer->id}}">
                      </div>

                  </div>
              </div>
              @endforeach
          </div>



            <div class="row"  style="text-align:center">
                <div class="col s12">
                    <a href="{{ route('client.index') }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
                        <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                    </a>
                    <button  title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
                        <i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar
                    </button >
                </div>
            </div>
            <input hidden type="text" id="entrenador" name="entrenador">

            

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
        $("#crear_cliente").validate({
            rules:{
                nombre:{
                    required:true,
                    maxlength:100
                },
                apellido_paterno:{
                    required:true,
                    maxlength:100
                },
                apellido_materno:{
                    required:true,
                    maxlength:100
                },
                direccion:{
                    required:true,
                    maxlength:500
                },
                documento:{
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                    digits: true
                },            
                telefono:{
                    required: false,
                    digits:true,
                    minlength:6,
                    maxlength:15
                },
                email:{
                    required:true,
                    email:true
                },
                fecha_nacimiento:{
                    required:true,
                    date: true
                },
                sede:{
                    required:true
                },
                foto:{
                    required:true
                }


            },
            messages:{
                nombre: {
                    required: "Debe ingresar el nombre",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                apellido_paterno: {
                    required: "Debe ingresar el apellido paterno",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                apellido_materno: {
                    required: "Debe ingresar el apellido materno",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                documento:{
                    required: "Debe ingresar el número", 
                    minlength: "Debe tener 8 dígitos mínimo", 
                    maxlength: "Debe tener 15 dígitos máximo", 
                    digits: "Solo puede ingresar números"
                } ,
                direccion:{
                    required: "Debe ingresar la dirección",
                    maxlength:"Sobrepasa el tamaño máximo"
                },
                telefono: {                
                    digits: "Solo puede ingresar números"  ,
                    minlength:"El número debe tener mínimo 6 dígitos",
                    maxlength:"Sobrepasa el tamaño máximo"
                },
                email: {
                    required: "Debe ingresar su correo",
                    email: "Ingrese un correo válido"
                },
                fecha_nacimiento:{
                    required: "Debe ingresar la fecha de nacimiento",
                    date:"Debe ser una fecha válida"
                },
                sede: "Elija una sede" ,
                foto: "Elija una foto" 


            },
            errorClass: 'invalid',
            errorPlacement: function (error, element) {
                element.next("label").attr("data-error", error.contents().text());
            }
        });
        //fin validate

        //validar DNI
        $( "#tipo_documento").change(function() {
            if( $("#tipo_documento").val() != "0" ){
                $("#documento").removeAttr( "maxlength");         
                $("#documento").removeAttr( "minlength");                       
            }
            else if( $("#tipo_documento").val() == "0" ){
                $("#documento").val('');
                $("#documento").attr( "maxlength",8);
                $("#documento").attr( "minlength",8);
            }
        });
    });

    $("#sexo").on("change", function(){
        if($(this).is(':checked')){ //mujer
            $(".fa-female").css("color","#e91e63");
            $(".fa-male").css("color","#9e9e9e"); 

        }
        else{ //hombre
            $(".fa-female").css("color","#9e9e9e");
            $(".fa-male").css("color","blue"); 
        }
    });

    $(".card").on("click",function(){
        $(".card").css("border","none");
        $(this).css("border","1px solid green");
        $("#entrenador").val($(this).find(".trainerid").val());
    });

</script>
@endsection

