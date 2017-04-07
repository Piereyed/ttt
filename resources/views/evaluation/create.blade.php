@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('client.index') }}" class="breadcrumb">Cliente</a>
                    <a href="#" class="breadcrumb">Nueva evaluación</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nueva evaluación</span>
            <div class="row">
                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                          <img src="{{ asset('storage/'.$client->photo)  }}" alt="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="circle">
                          <span class="title">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>

                          
                          <!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
                      </li>
                  </ul>
              </div>
              <form id="evaluar" files="true"  action="{{ route('evaluation.store',$client->id) }}" method="post" novalidate="true" class="col s12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- experiencia -->
                @if($client->experience_id != null)
                <div class="row">
                    <div class="input-field col s4 offset-s2 m4 offset-m4">
                        <i class="material-icons prefix">grade</i>
                        <select id="experience" name="experiencia" required="required" class="validate">
                            <option value="" disabled >Seleccione el nivel de experiencia</option>
                            @foreach($experiences as $experience)                            
                            <option @if($experience->id==$client->experience_id) selected @endif value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach
                        </select>
                        <label>Experiencia</label>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="input-field col s4 offset-s2 m4 offset-m4">
                        <i class="material-icons prefix">grade</i>
                        <select id="experiencia" name="experiencia" required="required" class="validate">
                            <option value="" disabled selected>Seleccione el nivel de experiencia</option>
                            @foreach($experiences as $experience)
                            <option value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach
                        </select>
                        <label>Experiencia</label>
                    </div>
                </div>
                @endif

                <!-- Objetivo -->                
                <div class="row">
                    <div class="input-field col s4 offset-s2 m4 offset-m4">
                        <i class="material-icons prefix">gps_fixed</i>
                        <select id="objetivo" name="objetivo" required="required" class="validate">
                            <option value="" disabled selected>Seleccione el objetivo deseado</option>
                            
                        </select>
                        <label>Objetivo</label>
                    </div>
                </div>
                
                
                <!-- medidas -->
                @foreach($measures as $measure)
                <div class="row">
                    <div class="input-field col s4 offset-s2 m2 offset-m4">
                        <input id="{{$measure->label}}" type="text" value="{{old($measure->label)}}" name="{{$measure->label}}" placeholder="" class="measure center" @if($measure->id>=14) readonly @endif>
                        <label class="active" for="{{$measure->label}}">{{$measure->name}}</label>
                    </div>  
                    <div class="input-field col s4 m2">
                        <input type="text" class="center" disabled value="{{$measure->unity}}"> 
                    </div>                   
                </div>
                @endforeach

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

<form id="formulario" method="post" novalidate="true" class="col s12">
   <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
</form>


@endsection

@section('scripts')
<script>
    $("#porcentajeGrasa").on("change",function (){
        cintura = $("#cintura").val();
        cadera = $("#cadera").val() ;
        peso = $("#peso").val();
        talla = $("#talla").val();
        porcgrasa = $("#porcentajeGrasa").val();
        porcmasa = $("#porcentajeMasaMagra").val();


        $("#grasa").val( porcgrasa * peso /100);
        $("#porcentajeMasaMagra").val( 100 - porcgrasa  );
        $("#masaMagra").val(          (100 -  porcgrasa) * peso /100 );
        $("#imc").val( Math.round(peso / (talla * talla )*100)/100               );
        $("#icc").val( Math.round( cintura / cadera *100)/100);
        $("#ica").val( Math.round( cintura / talla * 100)/100);


    });

    var params = $('#formulario').serialize();
    $("#experiencia").on("change",function (){

       $.ajax({
        type: 'POST',
        url: '/getGoals/' + $(this).val(),
        data: 'action=search&'+params,
        dataType: 'json',            
        success: function(goals) {      

                //vacio el select          
                $('#objetivo option').remove();
                $("#objetivo").append('<option value="" disabled selected>Seleccione</option>');
                $('#objetivo').material_select('');
                //llenar el select de zonas
                var size = goals.length;                
                for(var i = 0; i < size; i++){
                    $("#objetivo").append($('<option>', {
                        value: goals[i]['id'],
                        text: goals[i]['name']
                    }));
                }

                $('#objetivo').material_select();
            },
            error: function(data) {
                alert("Error al recuperar los objetivos.")
            }
        });

   });





</script>
@endsection

