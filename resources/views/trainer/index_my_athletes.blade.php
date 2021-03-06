@extends('index')


@section('content')
<?php 
function age($date){
    $birthDate = explode("-", $date);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1): (date("Y") - $birthDate[0]));
    return $age;
}
?>

<div class="section">
    <div class="row">
        <nav class="bread">
            <div class="nav-wrapper">
                <div class="col s12">                            
                    <a href="#" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Mis atletas</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12">
            <span class="h1">Mis atletas</span>


            <div class="row">
                @foreach($athletes as $client)
                <div class="col s6 m4 l3">
                    <div class="card" >
                        <div title="Ver" class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('storagee/'.$client->photo)  }}">
                        </div>
                        <div class="card-content">
                            <span style="text-overflow:ellipsis" title="{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}" class="card-title activator grey-text text-darken-4">{{$client->name.' '.$client->lastname1.' '.$client->lastname2}}<i class="material-icons right">more_vert</i></span>
                            <p><a href="{{route('evaluation.index',$client->id)}}">Evaluaciones</a></p>
                            @if($client->routines()->where('finished',0)->first() != null )
                            @if($client->routines()->where('finished',0)->first()->evaluated == 0 )
                            <p style="color:red"><a href="{{route('evaluation_rm.create',$client->id)}}">Medir RM</a></p>
                            @endif                            
                            @endif  
                            @if(  sizeof($client->routines()->where('finished', 0)->get() )> 0  )
                            <p><a href="{{route('hisroutines.index',$client->id)}}">Entrenar</a></p>
                            @endif  
                            @if($client->experience != null )
                            <p><a href="{{route('routine.index',$client->id)}}">Rutinas</a></p>
                            @endif
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Datos personales<i class="material-icons right">close</i></span>
                            <p><i class="tiny material-icons">cake</i> {{ age($client->birthday) }} años </p>
                            <p><i class="tiny material-icons">email</i> {{$client->email}}</p>
                            <p><i class="tiny material-icons">phone</i> {{ ($client->phone !=null ? $client->phone : 'Ninguno')}}</p>
                            <p><i class="tiny material-icons">place</i> {{ $client->address}}</p>
                            <p><i class="tiny material-icons">account_box</i> {{ ($client->type_doc==0?'DNI - ':'' ). $client->num_doc}}</p>
                            <p><a href="{{route('client.show',$client->id)}}">Ver más</a></p>

                        </div>
                    </div>
                </div>
                @endforeach
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