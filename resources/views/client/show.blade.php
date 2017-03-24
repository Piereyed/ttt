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
                          <img class="activator" src="{{ asset('storage/'.session('photo'))  }}">
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
                    <!-- <div class="card-content">
                      
                  </div> -->
                  <div class="card-tabs">
                      <ul class="tabs tabs-fixed-width">
                        <li class="tab"><a class="active" href="#test1">Programa</a></li>
                        <li class="tab"><a href="#test2">Evaluaciones</a></li>
                    </ul>
                </div>
                <div class="card-content grey lighten-4">
                  <div id="test1">Programa</div>
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
</div>


@endsection

@section('scripts')
<script>
    $( document ).ready(function(){

    });

</script>
@endsection
