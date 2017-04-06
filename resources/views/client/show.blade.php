@extends('index')
@section('content')


<div class="section">
  <div class="row">
    <nav class="bread">
      <div class="nav-wrapper">
        <div class="col s12">                            
          <a href="#" class="breadcrumb">Inicio</a>
          <a href="{{ route('client.index') }}" class="breadcrumb">Clientes</a>
          <a href="#" class="breadcrumb">Ver</a>
        </div>
      </div>
    </nav>
  </div>

  <div class="row">
    <div class="col m12">
      <span class="h1">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>

      <div class="row">
        <div class="col l4 s12">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{{ asset('storage/'.$client->photo)  }}">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}<i class="material-icons right">more_vert</i></span>
              <!-- <p><a href="#">This is a link</a></p> -->
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Datos personales<i class="material-icons right">close</i></span>
              <p><i class="tiny material-icons">cake</i> {{ $age }} años </p>
              <p><i class="tiny material-icons">email</i> {{$client->email}}</p>
              <p><i class="tiny material-icons">phone</i> {{ ($client->phone !=null ? $client->phone : 'Ninguno')}}</p>
              <p><i class="tiny material-icons">place</i> {{ $client->address}}</p>
              <p><i class="tiny material-icons">account_box</i> {{ ($client->type_doc==0?'DNI - ':'' ). $client->num_doc}}</p>
            </div>
          </div>
        </div>
        <div class="col l8 s12">
          <div class="card">                    
            <div class="card-tabs">
              <ul class="tabs tabs-fixed-width">
                <li class="tab"><a class="active" href="#test1">Programa</a></li>
                <li class="tab"><a href="#test2">Evaluaciones</a></li>
              </ul>
            </div>
            <div class="card-content grey lighten-4">
              <!-- pertania 1 -->
              <div id="test1">
                Entrenador: {{$client->trainer->name.' '.$client->trainer->lastname1}} <br>
                Experiencia: {{$client->experience_id!=null?$client->experience->name:'-'}}
              </div>
              <!-- pestania 2 -->
              <div id="test2">
                Evaluaciones <br>
                <a href="{{ route('evaluation.create',$client->id) }}" title="Nueva evaluación" class="btn-large waves-effect waves-light btn ">
                  <i class="left material-icons">assignment</i>Nueva evaluación
                </a >
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <div class="col s12">
    <canvas id="muscular_chart" width="400" height="400"></canvas>
  </div>

  <div class="col s12">
    <canvas id="measures_chart" width="400" height="400"></canvas>
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
  var ctx = $("#muscular_chart");
  var ctx2 = $("#measures_chart");

  Chart.defaults.global.defaultFontSize = 20;
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
        
        arrlabels=[];    //size n
        arrmeasures1=[];  //size 19
        arrmeasures2=[];  //size 19
        for(var i = 0; i < size; i++){
          arrlabels.push(arr[i][0]['created_at']);
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

  });

  






</script>
@endsection
