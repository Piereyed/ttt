@extends('home')

@section('styles')
<style>
    .sede{
        min-height: 100px !important;
        border: 1px solid black;
        text-align: center;
        display: table;
        cursor: pointer;
    }
    .sede:hover{
        border: 1px solid green;
    }
</style>

@endsection


@section('content')

<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <div class="col m12">
            <h1>Elija su sede</h1>
            <div class="row" style="min-height:36px">                
                <div class="opc col s12">
                    <form id="myform" method="POST" action="/entrar_sede" class="row">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input hidden type="text" id="sede" name="sede">
                        
                            @foreach($locals as $local)
                            <div id="{{$local->id}}" class="sede col s4">
                               <div style="display:table-cell; min-height:100px;vertical-align: middle">
                                  <div>
                                      {{$local->name}}
                                  </div>
                                   
                               </div>
                                
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