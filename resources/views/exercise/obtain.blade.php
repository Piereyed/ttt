@if(! $exercises->isEmpty())
<table class="responsive-table bordered highlight" name="table-objs">
    <thead>
        <tr>
            <th class="center" data-field="options">Elegir</th>
            <th class="center" data-field="muscle">Músculo</th>
            <th data-field="name">Nombre</th>                        
        </tr>
    </thead>

    <tbody>
        @foreach($exercises as $exercise)
        @if($exercise->exercise->training_phase_id == 2)
        <tr>
            <td class="opc center">
                <p>
                    <input type="checkbox" class="filled-in" id="{{ $exercise->id }}" />
                    <label for="{{ $exercise->id }}"></label>
                </p>
            </td>
            
            <td hidden class="center hidden">Simple</td>
            <td hidden><input type="number" value="1" name="tipo_ejer[{{$index}}][]"></td>
            
            <td hidden class="id_musculo">@if($exercise->exercise->type != 0){{$exercise->exercise->muscles[0]->id }}@endif</td>
            <td class="center">@if($exercise->exercise->type == 0) Todos @else {{ $exercise->exercise->muscles[0]->name }}@endif</td>
            
            <td hidden><input type="number" name="id_ejer[{{$index}}][]" value="{{$exercise->exercise->id}}" ></td> 
            <td>{{ $exercise->exercise->name }}</td> 
            <td hidden class="center hidden series"></td>
            <td hidden class="        series_input"></td>
            <td hidden class="center hidden"><a title="Quitar" class="quitar btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a></td>                        

        </tr>  
        @endif 
        @endforeach                 
    </tbody>
</table>
@else
<h5>No existen ejercicios.</h5>
@endif

<script type="text/javascript">
    $( ".opc" ).click(function() {

        var me = $( this ).find('input') ;
        if(me.is(':checked')){
            me.prop('checked', false); 
            var tr = $( this ).parent().removeClass("elegido") ;
        }        
        else{
            me.prop('checked', true);  
            var tr = $( this ).parent().addClass("elegido") ;
        }      

    });
</script>