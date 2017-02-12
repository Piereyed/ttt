@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <div class="col m12">
            <h1>Nuevo cliente</h1>
            <div class="row">
                <form id="crear_cliente" action="" novalidate="true" class="col s12">
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input required id="name" type="text" class="validate" data-length="100">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col m4 s12">                           
                            <input id="lastname1" type="text" class="validate" data-length="100">
                            <label for="lastname1">Apellido paterno</label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input id="lastname2" type="text" class="validate" data-length="100">
                            <label for="lastname2">Apellido materno</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6">
                            <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                            <input id="email" type="email" data-error="Mal" class="validate" data-length="100">
                            <label for="email">Correo electrónico</label>
                        </div>
                        <div class="col s6 m6">
                            <div style="display:">
                                <input class="with-gap" name="sexo" type="radio" id="male" />
                                <label for="male">Hombre </label>
                                <i for="male" title="Hombre" class="fa fa-male fa-3x" aria-hidden="true"></i>
                            </div>
                            <div style="display:">
                                <input class="with-gap" name="sexo" type="radio" id="female" />
                                <label for="female">Mujer </label>
                                <i for="female" title="Mujer" class="fa fa-female fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">textsms</i>
                            <textarea id="address" class="materialize-textarea" data-length="500"></textarea>
                            <label for="address">Dirección</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="prefix fa fa-birthday-cake" aria-hidden="true"></i>
                            <input id="birthdate" type="date" class="datepicker">
                            <label for="birthdate" class="">Fecha de nacimiento</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col m9 s12">
                            <button  title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
                                <i class="left fa fa-floppy-o" aria-hidden="true"></i>Guardar
                            </button >
                            <a title="Cancelar" class="waves-effect waves-teal btn-flat ">
                                <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                            </a>


                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



</div>


@endsection