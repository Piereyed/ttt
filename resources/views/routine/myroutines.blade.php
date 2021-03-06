@extends('index')

@section('styles')
<style type="text/css">
    .caja{
        width: 35px;
        height: 25px;    
        text-align: center;
        display: table-cell;
        border: 1px solid black;
        letter-spacing: -2px;
    }
    .a{
        background-color: red;
    }
    .b{
        background-color: green;
    }
    .c{
        background-color: yellow;
    }
    .d{
        background-color: blue;
    }
    .e{
        background-color: white;
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
                    <a href="#!" class="breadcrumb">Mis sesiones</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Mis sesiones de entrenamiento</span>                      

            <div class="row">
                <div class="col s12">

                    @if($sessions != null)
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>Rutina {{$routine->number}}</h4></li>
                        @foreach($sessions as $session)
                        <li class="collection-item">
                            <div>
                                Sesión {{$session->number}} - {{strtoupper( $session->training->letter)}}
                                @if(!$session->done)
                                <a href="{{route('routine.train',$session->id)}}" class="secondary-content">
                                   @if( $session->id == $todo )
                                    <i class="material-icons">send</i>
                                    @endif
                                </a>
                                @else
                                <a title="Ver resumen de sesión" href="{{route('routine.showsession',$session->id)}}" class="secondary-content">                                   
                                    <i class="material-icons">visibility</i>                                    
                                </a>                                
                                @endif
                            </div>
                        </li>
                        @endforeach                         
                    </ul>
                    @else
                    <h4>No hay sesiones pendientes</h4>
                    @endif
                </div>
            </div>
        </div>                    
    </div>

</div>




@endsection



@section('scripts')

<script>
    var aux;

    $( document ).ready(function(){

        var params = $('#formulario').serialize();
        $("#periodo").on("change",function(){           

            $.ajax({
                type: 'POST',
                url: '/getMicrocycles/' + $(this).val() + '/' + $("#exp").val(),
                data: 'action=search&'+params,
                dataType: 'json',            
                success: function(microcycles) {      
                //vacio el contenedor
                $(".microciclo_container tr").remove();                

                aux = microcycles;                
                
                var size = microcycles.length;

                //el contenido de los units
                var cad = "";
                for(var i = 0; i < size; i++){
                    cad+='<tr>   <td class="opcion center">  <p>   <input name="microciclo" value="'+ microcycles[i]['id'] +'" type="radio" class="filled-in" id="'+ microcycles[i]['id'] +'" />                       <label class="label" for="'+ microcycles[i]['id'] +'"></label>           </p>     </td>    <td class="center">';

                    var unit_unit = microcycles[i]['units'].length;
                    for (var j = 0; j < unit_unit; j++) {
                        cad += '<div class="caja ';
                        if(microcycles[i]['units'][j]['letter'] !='-'){
                            cad+=microcycles[i]['units'][j]['letter'];
                        }
                        else{
                            cad+=' ';
                        }
                        cad+='">';
                        cad+= microcycles[i]['units'][j]['letter'].toUpperCase();

                        if(microcycles[i]['units'][j]['level'] > 0 ){
                            cad+=microcycles[i]['units'][j]['level'];
                        }
                        
                        if(microcycles[i]['units'][j]['type_session'] == 1){
                            cad+='<sub>M</sub>';
                        }
                        else if (microcycles[i]['units'][j]['type_session'] == 2) {
                            cad+='<sub>C</sub>';   
                        }

                        cad+='</div>';

                        if( ((j+1) % 7 )== 0){
                            cad+='<br>';
                        }
                        
                        
                    }
                    cad+='</td>   </tr>';
                }

                $(".microciclo_container tbody").append(cad);

            },
            error: function(data) {
                alert("Error al recuperar los objetivos.")
            }
        });


        });

        $('tbody').on("click",'input',function(){ 

            var m = $('input[name="microciclo"]:checked').val();
            var p = $("#periodo").val();
            var id = $("#person_id").val();

            $("#crear").attr('href','/rutinas/create/'+id+'/'+p+'/'+m);
        });

    });

    

</script>
@endsection