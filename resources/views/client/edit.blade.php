@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <div class="col m12">
            <h1>Editar cliente</h1>
            <div class="row">
                <form id="crear_cliente" action="{{ route('client.update',$client->id) }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <i class="fa fa-address-card prefix" aria-hidden="true"></i>
                            <input id="document" name="document" value="{{ $client->num_doc }}" type="text" class="validate" data-length="15" >
                            <label for="document">Número de documento</label>
                        </div>
                        <div class="input-field col m4 s6">
                            <select name="type_document">
                                <option value="0" selected>DNI</option>
                                <option value="1">Pasaporte</option>
                                <option value="2">Carnet de extrajería</option>
                            </select>
                            <label>Tipo de documento</label>
                        </div>
                        <div class="col s6 m4">
                            <div style="display:">
                                <input class="with-gap" name="sex" type="radio" id="male" value="H" />
                                <label for="male">Hombre </label>
                                <i for="male" title="Hombre" class="fa fa-male fa-3x" aria-hidden="true"></i>
                            </div>
                            <div style="display:">
                                <input class="with-gap" name="sex" type="radio" id="female" value="M" />
                                <label for="female">Mujer </label>
                                <i for="female" title="Mujer" class="fa fa-female fa-3x" aria-hidden="true"></i>
                            </div>
                        </div> 
                    </div>


                    <div class="row">
                        <div class="input-field col m4 s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" name="name" value="{{$client->name }}" type="text" class="validate" data-length="100">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col m4 s6">                           
                            <input id="lastname1" type="text" value="{{ $client->lastname1 }}" name="lastname1" class="validate" data-length="100">
                            <label for="lastname1">Apellido paterno</label>
                        </div>
                        <div class="input-field col m4 s6">
                            <input id="lastname2" type="text" value="{{ $client->lastname2}}" name="lastname2" class="validate" data-length="100">
                            <label for="lastname2">Apellido materno</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6 m6">
                            <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                            <input id="email" type="email" name="email" value="{{$client->email }}" class="validate" data-length="100">
                            <label for="email">Correo electrónico</label>
                        </div>
                        <div class="input-field col m6 s6">
                            <i class="material-icons prefix">phonelink_ring</i>
                            <input id="phone" name="phone" value="{{ $client->phone }}" type="text" class="validate" data-length="15" >
                            <label for="phone">Teléfono</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="fa fa-map-marker prefix" aria-hidden="true"></i>
                            <input id="address" type="text" name="address" value="{{ $client->address }}" class="materialize-textarea" data-length="500">
                            <label for="address">Dirección</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="prefix fa fa-birthday-cake" aria-hidden="true"></i>
                            <input id="birthdate" type="date" value="{{ $client->birthday }}" name="birthday" class="datepicker">
                            <label for="birthdate" class="">Fecha de nacimiento</label>
                        </div>

                    </div>

                    <div class="row">                       
                        <div class="input-field col m12 s6">
                            <i class="fa fa-building prefix" aria-hidden="true"></i>
                            <select id="local" name="local">
                                <option value="">Seleccione</option>
                                <option value="1">Surco</option>
                                <option value="2">Miraflores</option>
                            </select>
                            <label>Sede</label>
                        </div>
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
                name:{
                    required:true,
                    maxlength:100
                },
                lastname1:{
                    required:true,
                    maxlength:100
                },
                lastname2:{
                    required:true,
                    maxlength:100
                },
                address:{
                    required:true,
                    maxlength:500
                },
                document:{
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                    digits: true
                },            
                phone:{
                    digits:true,
                    minlength:6,
                    maxlength:15
                },
                email:{
                    required:true,
                    email:true
                },
                birthday:{
                    required:true,
                    date: true
                },
                local:{
                    required:true
                }


            },
            messages:{
                name: {
                    required: "Debe ingresar el nombre",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                lastname1: {
                    required: "Debe ingresar el apellido paterno",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                lastname2: {
                    required: "Debe ingresar el apellido materno",
                    maxlength: "Sobrepasa el tamaño máximo"
                },
                document:{
                    required: "Debe ingresar el número", 
                    minlength: "Debe tener 8 dígitos mínimo", 
                    maxlength: "Debe tener 15 dígitos máximo", 
                    digits: "Solo puede ingresar números"
                } ,
                address:{
                    required: "Debe ingresar la dirección",
                    maxlength:"Sobrepasa el tamaño máximo"
                },
                phone: {                
                    digits: "Solo puede ingresar números"  ,
                    minlength:"El número debe tener mínimo 6 dígitos",
                    maxlength:"Sobrepasa el tamaño máximo"
                },
                email: {
                    required: "Debe ingresar su correo",
                    email: "Ingrese un correo válido"
                },
                birthday:{
                    required: "Debe ingresar la fecha de nacimiento",
                    date:"Debe ser una fecha válida"
                },
                local: "Elija una sede" ,


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

