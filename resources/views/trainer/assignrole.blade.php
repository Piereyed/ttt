@extends('index')
@section('styles')
<style type="text/css">
    .autocomplete-content.dropdown-content img{
        display: none;
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
                    <a href="{{ route('trainer.index') }}" class="breadcrumb">Entrenadores</a>
                    <a href="#" class="breadcrumb">Asignar</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Asignar rol de entrenador</span>
            <div class="row">
                <form id="asignar_entrenador" action="{{route('trainer.storerole')}}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">textsms</i>
                                  <input type="text" id="nombre" class="autocomplete">
                                  
                                  <label for="nombre">Escriba el nombre de la persona...</label>
                              </div>
                          </div>
                          <input type="text" id="codigo" name="codigo" hidden >
                      </div>
                  </div>

            <div class="row"  style="text-align:center">
                <div class="col s12">
                    <a href="{{ route('trainer.index') }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
                        <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
                    </a>
                    <button id="submit" title="Guardar" type="submit" class="btn-large waves-effect waves-light btn ">
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
    var people = {};

   
    $( document ).ready(function(){

        //para manejar los botones de opciones para entrenadores
        $( ".opcion" ).click(function() {
            var me = $( this ).find('input').prop('checked', true) ;
            $("#submit").removeAttr("disabled"); 
        });


        //    $("select").val('10');
        $('select').addClass("browser-default");
        $('select').material_select();


        //ajax
        var params = $('#asignar_entrenador').serialize();

        $.ajax({
            type: 'POST',
            url: '/searchTrainer',
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(personas) {
                // alert(personas[1]['lastname1']);
                var size = personas.length;
                
                for(var i = 0; i < size; i++){
                    people[personas[i]['name'] + ' ' +  personas[i]['lastname1'] + ' ' + personas[i]['lastname2']] = personas[i]['id'];
                }

                $('input.autocomplete').autocomplete({
                    data: people,
                    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                });


            },
            error: function(data) {
                alert("Error.")
            }
        });
        // fin ajax

        $( "#nombre" ).change(function() {
            $("#codigo").val(people[$( "#nombre" ).val()]);
        });

        

    });

    
   

</script>
@endsection