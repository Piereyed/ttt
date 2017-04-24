@extends('index')
@section('content')


<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="{{ route('client.index') }}" class="breadcrumb">Cliente</a>
                    <a href="#" class="breadcrumb">Nueva evaluación de RM</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col m12">
            <span class="h1">Nueva evaluación de RM</span>
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
                <div class="row">
                @if($client->experience_id != null)
                
                    <div class="input-field col s4 offset-s2 m4 offset-m1">
                        <i class="material-icons prefix">grade</i>
                        <select id="experience" name="experiencia" required="required" class="validate">
                            <option value="" disabled >Seleccione el nivel de experiencia</option>
                            @foreach($experiences as $experience)                            
                            <option @if($experience->id==$client->experience_id) selected @endif value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach
                        </select>
                        <label>Experiencia</label>
                    </div>
                
                @else
                
                    <div class="input-field col s4 offset-s2 m4 offset-m1">
                        <i class="material-icons prefix">grade</i>
                        <select id="experiencia" name="experiencia" required="required" class="validate">
                            <option value="" disabled selected>Seleccione el nivel de experiencia</option>
                            @foreach($experiences as $experience)
                            <option value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach
                        </select>
                        <label>Experiencia</label>
                    </div>
                
                @endif

                    <!-- Objetivo -->
                    <div class="input-field col s4 offset-s2 m4 offset-m2">
                        <i class="material-icons prefix">gps_fixed</i>
                        <select id="objetivo" name="objetivo" required="required" class="validate">
                            <option value="" disabled selected>Seleccione el objetivo deseado</option>
                            
                        </select>
                        <label>Objetivo</label>
                    </div>
                </div>
                
                
                <!-- medidas -->
                <div class="row">
                
                </div>

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
    

</script>
@endsection

