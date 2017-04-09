@if(! $exercises->isEmpty())
<table class="responsive-table bordered highlight" name="table-objs">
    <thead>
        <tr>
            <th class="center" data-field="options">Elegir</th>
            <th data-field="name">Nombre</th>                        
            <th data-field="type">Tipo</th>                        
            <th data-field="phase">Phase</th>                        
            <th class="center" data-field="muscle">Músculo</th>
        </tr>
    </thead>

    <tbody>
        @foreach($exercises as $exercise)
        @if($exercise->exercise->training_phase_id == 2)
        <tr>
            <td class="opcion center">
                <p>
                    <input type="checkbox" class="filled-in" id="{{ $exercise->id }}" />
                    <label for="{{ $exercise->id }}"></label>
                </p>
            </td>
            <td>{{ $exercise->exercise->name }}</td>                        
            <td class="center">@if($exercise->exercise->type == 0) Aaeróbico @else Anaeróbico @endif </td>                        
            <td class="center">{{$exercise->exercise->phase->name}}</td>                        
            <td class="center">@if($exercise->exercise->type == 0) Todos @else {{ $exercise->exercise->muscles[0]->name }}@endif</td>
        </tr>  
        @endif 
        @endforeach                 
    </tbody>
</table>



<!-- <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <center>
            <a title="Agregar ejercicios" data-remodal-action="cancel" class="btn btn-primary" onclick="selectQuestions()" id="select-questions"><i class="fa fa-plus"></i> Agregar</a>
        </center>        
    </div>
</div> -->
@else
<h5>No existen ejercicios.</h5>
@endif

<script type="text/javascript">
    $( ".opcion" ).click(function() {

        var me = $( this ).find('input') ;
        if(me.is(':checked')){
            me.prop('checked', false); 
        }        
        else{
            me.prop('checked', true);            
        }      

    });
</script>