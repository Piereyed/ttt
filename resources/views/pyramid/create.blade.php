@extends('index')
@section('styles')
<style type="text/css">
    input{
        text-align: center;
    }

    .piramide {
      text-align: center;
  }

  .inside-text {          
      position: relative;
      top: 25px;
      left: -5px;
  }
  .parte{        
    border-left: 25px solid transparent;
    border-right: 25px solid transparent;
    height: 0;        
    margin-right:auto;
    margin-left:auto;
}
#uno{    
    border-bottom: 50px solid rgba(119,119,119,0.6);
    width: 0px;    
}

#2 {   
    border-bottom: 50px solid rgba(119,119,119,0.8); 
    width: 100px;   
}

#3{  
    border-bottom: 50px solid rgba(119,119,119,1); 
    width: 150px;  
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
                    <a href="#!" class="breadcrumb">Pirámides</a>
                    <a href="#!" class="breadcrumb">Editar</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Editar pirámide</span>
            <div class="row">
                <form id="crear_microciclo" action="{{ route('pyramid.store') }}" method="post" novalidate="true" class="col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="input-field col m8 offset-m2 s12">     
                            <i class="material-icons prefix" >linear_scale</i>                       
                            <select id="periodo" name="periodo" required="required" class="validate">
                                <option value="" disabled selected>Seleccione</option>
                                @foreach($periods as $period)
                                <option value="{{$period->id}}">{{$period->name}}</option>
                                @endforeach
                            </select>
                            <label>Periodo</label>
                        </div>
                    </div>
                    <h4>Detalle</h4>
                    <div class="row">
                        <div class="input-field col m4 offset-m4 s12">
                            <i class="material-icons prefix">query_builder</i>
                            <input id="duracion_descanso" name="duracion_descanso" value="{{ old('duracion_descanso') }}" type="number" class="validate ">
                            <label class="active" for="duracion_descanso">Duracíón de descanso (seg.)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <i class="material-icons prefix">filter_list</i>
                            <select id="series" name="numero_series" required="required" class="validate">
                                <option selected disabled value="">Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <label>Número de series</label>
                        </div>
                        <div id="input-series" class="col m2 offset-m1 s12">
                            <h6>Series</h6>
                        </div>
                        <div class="col m4 offset-m1 s12">
                            <h6>Pirámide</h6>
                            <div class="piramide">
                                <!-- <div class="parte" id="uno">
                                    <div class="inside-text"></div>
                                </div> -->
                                
                            </div>
                        </div>
                        
                    </div>
                    

                    <div class="row" style="text-align:center">
                        <div class="cos s12" >
                            <a href="{{ route('microcycle.index') }}" title="Regresar" class="btn-large waves-effect waves-teal btn-flat ">
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
    var num = 0;

    $( document ).ready(function(){



        $("#series").on("change",function(){
            num = $(this).val();
            $("#input-series input").remove();
            for (var i = 0; i <num ; i++) {
                $("#input-series").append('<input type="number" name="series['+i+']">');
            }
            
        });







    });

</script>

@endsection

