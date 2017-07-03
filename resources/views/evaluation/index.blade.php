@extends('index')
@section('styles')
<style>
    .indicator{
        left: 0;
        right: 797px;
    }
    #grafico_rm{
        background-color: rgba(0,0,0,0.1);
        padding: 20px;
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
                    <a href="{{ route('myathletes.index') }}" class="breadcrumb">Mis atletas</a>
                    <a href="#" class="breadcrumb">Evaluaciones</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">

        <div class="col s12">
            <span class="h1">Evaluaciones de {{$client->name}}</span>

            <div class="fixed-action-btn">
                <a href="{{ route('evaluation.create',$client->id) }}" title="Nueva evaluación" class="btn-floating waves-effect waves-light btn-large green"><i class="material-icons">add</i></a>
            </div> 
        </div> 
    </div>
    <div class="row">

        <div class="col s12"> 

            <ul class="tabs">
                <li class="tab col s3"><a href="#ev">Evaluaciones</a></li>
                <li class="tab col s3"><a href="#grafico">Evolución física</a></li>
                <li class="tab col s3"><a href="#graficorm">Evolución RM</a></li>
            </ul> 
        </div>  
        <div id="ev" class="col s12">
            <div class="row">
                <div class="col s12">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4>Evaluaciones físicas</h4></li>
                        @foreach($evaluations as $key=>$ev)
                        <li class="collection-item">
                            <div>
                                Evaluación del {{  date_format($ev->created_at, 'd/m/Y') }}
                                <a href="{{route('evaluation.show',$ev->id)}}" class="secondary-content">
                                    <i title="Ver" class="material-icons">visibility</i>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div id="grafico" class="col s12">
            <div class="row">
                <div class="col s12 m10 offset-m1 l8 offset-l2">
                    <canvas id="muscular_chart" width="400" height="400"></canvas>
                </div>

                <div class="col s12 m10 offset-m1 l8 offset-l2">
                    <canvas id="measures_chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>

        <div id="graficorm" class="col s12">
            <div class="row" style="margin-top:30px">
                <div class="col s12">
                    <!-- musculos -->
                    <div class="ej input-field col m6 offset-m3 s12">     
                        <i class="material-icons prefix" >accessibility</i>                       
                        <select id="musculo">
                            <option value="" disabled selected>Seleccione</option>
                            @foreach($muscles as $muscle)
                            <option value="{{$muscle->id}}">{{$muscle->name}}</option>
                            @endforeach
                        </select>
                        <label>Músculo</label>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col l5">
                    <h5>Ejercicios</h5>
                    <div class="ejercicios">

                    </div>



                </div>
                <div class="col s12 m10 offset-m1 l7">

                    <div id="grafico_rm">
                        <canvas id="rm_chart" width="400" height="400"></canvas> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row"  style="text-align:center">
        <div class="col s12">
            <a href="{{ route('myathletes.index') }}" title="Cancelar" class="waves-effect waves-teal btn-flat btn-large">
                <i class="left fa fa-step-backward" aria-hidden="true"></i>Regresar
            </a>
        </div>
    </div>
</div>

<form id="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
    <input id="idClient" type="hidden" name="idClient" value="{{$client->id}}">                    

</form>

@endsection

@section('scripts')
<script>
    var colors = ["red","green","blue","yellow", "purple","orange","brown","coral","cyan","#26a69a"]
    var arrr;
    var arr_rm;
    var ctx = $("#muscular_chart");
    var ctx2 = $("#measures_chart");
    var ctx_rm = $("#rm_chart");

    Chart.defaults.global.defaultFontSize = 10;
    Chart.defaults.global.responsiveAnimationDuration = 1000;

    Chart.defaults.global.elements.line.tension =  0.1;
    Chart.defaults.global.elements.line.fill = false;

    $( document ).ready(function(){
        var params = $('#form').serialize();

        $.ajax({
            type: 'POST',
            url: '/getMeasures/' + $("#idClient").val(),
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(arr) {
                var size = arr.length;  
                arrr=arr;
                arrlabels=[];    //size n
                arrmeasures1=[];  //size 19
                arrmeasures2=[];  //size 19
                for(var i = 0; i < size; i++){
                    arrlabels.push(  formatDate(new Date(arr[i][0]['created_at']))  );
                }

                //primer grafico
                for (var j = 0; j < 10 ; j++) {
                    var values = [];

                    for(var i = 0; i < size; i++){
                        values.push(arr[i][1][j]['pivot']['value']); 
                    }

                    var obj = {
                        label: arr[0][1][j]['name'],        
                        borderColor: colors[j],
                        backgroundColor: colors[j],
                        data: values,  
                    }

                    arrmeasures1.push(obj);
                }

                //segundo grafico
                for (var j = 11; j < 16 ; j++) {
                    var values = [];

                    for(var i = 0; i < size; i++){
                        values.push(arr[i][1][j]['pivot']['value']); 
                    }

                    var obj = {
                        label: arr[0][1][j]['name'],        
                        borderColor: colors[j-11],
                        backgroundColor: colors[j-11],
                        data: values,  
                    }

                    arrmeasures2.push(obj);
                }



                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: arrlabels,
                        datasets: arrmeasures1
                    },
                    options: {

                        title: {
                            display: true,
                            text: 'Progreso muscular',
                            fontSize:30
                        },

                        hover: {            
                            mode: 'nearest'
                        },

                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        },

                        legend: {
                            display: true,
                            labels: {
                                fontColor: '#616161'
                            }
                        }
                    }
                });

                //segundo chart
                var myChart2 = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: arrlabels,
                        datasets: arrmeasures2
                    },
                    options: {

                        title: {
                            display: true,
                            text: 'Progreso General',
                            fontSize:30
                        },

                        hover: {            
                            mode: 'nearest'
                        },

                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        },

                        legend: {
                            display: true,
                            labels: {
                                fontColor: '#616161'
                            }
                        }
                    }
                });

            },
            error: function(data) {
                alert("Error.")
            }
        });






        //pedir los ejercicios del musculo elegido

        $("#musculo").change(function(){
            var musculo = $("#musculo").val();//codigo del musculo
            //            alert(musculo);
            $.ajax({
                type: 'POST',
                url: '/getExercisesOfMuscle/' + musculo,
                data: 'action=search&'+params,
                dataType: 'json',            
                success: function(exercises) {
                    var size = exercises.length; 
                    if(size == 0){
                        $(".ejercicios p").remove();
                        $(".ejercicios").append('<p>No ha realizado ejercicios para este músculo aun.</p>');
                    }
                    else{
                        $(".ejercicios p").remove();

                        for(var i = 0; i < size; i++){
                            $(".ejercicios").append('<p><input name="ejercicio" value="'+exercises[i]['id']+'" type="radio" id="ej'+exercises[i]['id']+'" />     <label for="ej'+exercises[i]['id']+'">'+exercises[i]['name']+'</label> </p>');
                            exercises
                        } 
                    }

                }
            });
        });

        $('.ejercicios').on('change', 'input[name=ejercicio]:checked', function() {
            var ejercicio_id = $(this).val();


            //para el grafico de RM
            $.ajax({
                type: 'POST',
                url: '/getRMs/' + $("#idClient").val(),
                data: 'action=search&ejercicio='+ejercicio_id+'&'+params,
                dataType: 'json',            
                success: function(arr) {   
                    var size = arr.length;  
                    arr_rm=arr;
                    arrlabels=[];//size n
                    arr_rms=[]; 
                    
                    arrlabels.push(  formatDate(new Date(arr[0]['created_at']))  );
                    for(var i = 0; i < size; i++){
                        arrlabels.push(  formatDate(new Date(arr[i]['updated_at']))  );
                    }

                    //grafico


                    var values = [];
                    values.push(arr[0]['rm_inicial']); 
                    for (var i = 0; i < size ; i++) {
                        values.push(arr[i]['rm_final']); 
                    }

                    var obj = {
                        label: arr[0]['exercise']['name'],        
                        borderColor: "green",
                        backgroundColor: "green",
                        data: values,  
                    }

                    arr_rms.push(obj);



                    var myChart = new Chart(ctx_rm, {
                        type: 'line',
                        data: {
                            labels: arrlabels,
                            datasets: arr_rms
                        },
                        options: {

                            title: {
                                display: true,
                                text: 'Progreso RM',
                                fontSize:30
                            },

                            hover: {            
                                mode: 'nearest'
                            },

                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            },

                            legend: {
                                display: true,
                                labels: {
                                    fontColor: '#616161'
                                }
                            }
                        }
                    });

                },
                error: function(data) {
                    alert("Error al graficar la evolución de RM.")
                }
            });

        });

    });


    function formatDate(date) {
        var monthNames = [
            "Enero", "Febrero", "Marzo",
            "Abril", "Mayo", "Junio", "Julio",
            "Agosto", "Setiembre", "Octubre",
            "Noviembre", "Diciembre"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex];
    }






</script>
@endsection


