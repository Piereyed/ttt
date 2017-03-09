@extends('home')

@section('styles')
<style>
    .sede{
        min-height: 100px !important;
        border: 1px solid black;                
        cursor: pointer;
        margin: 5px;
        background-color: rgba(255,255,255,0.5);
        -webkit-transition: border 0.5s; /* Safari */
        transition: border 0.2s;
    }
    .sede:hover{
        border: 6px solid black;
    }
</style>

@endsection


@section('content')

<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12">
            <h2>Elija su sede</h2>
            <div class="row" style="min-height:36px">                
                <div class="opc col s12">
                    <form id="myform" method="POST" action="/entrar_sede" class="row">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input hidden type="text" id="sede" name="sede">
                        
                            @foreach($locals as $local)
                            <div id="{{$local->id}}" class="sede valign-wrapper ">
                               
                                      <h5 style="width:100%" class="valign center">{{$local->name}}</h5>
                                
                                
                            </div>
                            
                            @endforeach
<!--                            <input hidden id="submit" class="submit" type="submit" value="Enviar">-->
                    </form>

                </div>
            </div>


        </div>                    
    </div>

</div>
@endsection


@section('scripts')

<script>
$(".sede").on('click', function (){
    $("#sede").val('' + $(this).attr("id"));
    
    document.forms["myform"].submit();
    
});
</script>


@endsection