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
                    <a href="{{route('myathletes.index')}}" class="breadcrumb">Mis rutinas</a>
                </div>
            </div>
        </nav>
    </div>

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <span class="h1">Mis Rutinas</span>
            <!-- fixed action buttons -->
            <div class="fixed-action-btn click-to-toggle">
                <a title="Opciones" class="btn-floating btn-large grey darken-2">
                    <i class="material-icons">view_module</i>
                </a>   
                <ul>                                 
                    <li hidden><a id="eliminar"  title="Eliminar" data-target="" class="btn-floating btn-large waves-effect waves-light red "><i class="material-icons">delete</i></a></li>                  
                    <li hidden><a id="editar"  title="Editar" class="btn-floating btn-large waves-effect waves-light yellow darken-1"><i class="material-icons">mode_edit</i></a></li>

                    <li hidden ><a id="ver"  title="Ver" class="btn-floating btn-large waves-effect waves-light blue "><i class="material-icons">visibility</i></a></li>


                    <li><a id="nuevo" href="#modal1" title="Nuevo" class="btn-floating waves-effect waves-light btn-large green"><i class="material-icons">add</i>
                    </a></li> 
                </ul>             
            </div>             

            <div class="row">
                <div class="col s12">


                    <ul class="collection with-header">
                        <li class="collection-header"><h4>Rutina {{$routine->number}}</h4></li>
                        @foreach($sessions as $session)
                        <li class="collection-item">
                            <div>
                                Sesión {{$session->number}} - {{strtoupper( $session->training->letter)}}
                                @if(!$session->done)
                                <a href="{{route('routine.train',$session->training_id)}}" class="secondary-content">
                                    <i class="material-icons">send</i>
                                </a>
                                @else
                                (Terminada)
                                @endif
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                    
                    
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