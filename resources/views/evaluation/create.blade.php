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
                          <img src="{{ asset('storage/'.session('photo'))  }}" alt="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="circle">
                          <span class="title">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}</span>
                          <p>Nivel: Principiante</p>
                          <!-- <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a> -->
                      </li>
                  </ul>
              </div>
              <form id="crear_cliente" files="true" enctype="multipart/form-data"  action="{{ route('client.store') }}" method="post" novalidate="true" class="col s12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="input-field col s8 offset-s2 m4 offset-m4">
                        <input type="text" id="ee" name="ee" placeholder="44">
                        <label class="active" for="ee">Cuellito</label>
                    </div>                    
                </div>

                @foreach($measures as $measure)
                <div class="row">
                    <div class="input-field col s8 offset-s2 m4 offset-m4">
                        <input id="{{$measure->name}}" type="text" name="{{$measure->name}}" placeholder="23" class="measure">
                        <label class="active" for="{{$measure->name}}">{{$measure->name}}</label>
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


@endsection

@section('scripts')
<script>

    $('#ee').formatter({
          'pattern': '{{9999}}-{{99}}-{{99}}',
          'persistent': true
      });

    

</script>
@endsection

