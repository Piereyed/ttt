@extends('index')
@section('styles')
<style>
    .indicator{
        left: 0;
        right: 797px;
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
                                    <i class="material-icons">send</i>
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
            <div class="row">
                <div class="col s12 m10 offset-m1 l8 offset-l2">
                    <canvas id="rm_chart" width="400" height="400"></canvas>
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

        //para el grafico de RM
        $.ajax({
            type: 'POST',
            url: '/getRMs/' + $("#idClient").val(),
            data: 'action=search&'+params,
            dataType: 'json',            
            success: function(arr) {   
                var size = arr.length;  
                arr_rm=arr;
                arrlabels=[];//size n
                arr_rms=[]; 

                for(var i = 0; i < size; i++){
                    arrlabels.push(  formatDate(new Date(arr[i]['updated_at']))  );
                }

                //primer grafico
                
                for (var j = 0; j < 1 ; j++) {
                    var values = [];

                    for (var i = 0; i < size ; i++) {
                        values.push(arr[i]['rm_final']); 
                    }

                    var obj = {
                        label: arr[0]['exercise']['name'],        
                        borderColor: "red",
                        backgroundColor: "red",
                        data: values,  
                    }

                    arr_rms.push(obj);
                }
                
                
                

                //segundo grafico
                //                for (var j = 11; j < 16 ; j++) {
                //                    var values = [];
                //
                //                    for(var i = 0; i < size; i++){
                //                        values.push(arr[i][1][j]['pivot']['value']); 
                //                    }
                //
                //                    var obj = {
                //                        label: arr[0][1][j]['name'],        
                //                        borderColor: colors[j-11],
                //                        backgroundColor: colors[j-11],
                //                        data: values,  
                //                    }
                //
                //                    arrmeasures2.push(obj);
                //                }



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

                //segundo chart
                //                var myChart2 = new Chart(ctx2, {
                //                    type: 'line',
                //                    data: {
                //                        labels: arrlabels,
                //                        datasets: arrmeasures2
                //                    },
                //                    options: {
                //
                //                        title: {
                //                            display: true,
                //                            text: 'Progreso General',
                //                            fontSize:30
                //                        },
                //
                //                        hover: {            
                //                            mode: 'nearest'
                //                        },
                //
                //                        scales: {
                //                            yAxes: [{
                //                                ticks: {
                //                                    beginAtZero:true
                //                                }
                //                            }]
                //                        },
                //
                //                        legend: {
                //                            display: true,
                //                            labels: {
                //                                fontColor: '#616161'
                //                            }
                //                        }
                //                    }
                //                });

            },
            error: function(data) {
                alert("Error al graficar.")
            }
        });

    });


    function formatDate(date) {
        var monthNames = [
            "Enero", "Febrero", "March",
            "Abril", "Mayo", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex];
    }






</script>
@endsection


