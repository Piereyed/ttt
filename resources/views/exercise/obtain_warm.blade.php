@if(! $exercises->isEmpty())

@foreach($exercises as $exercise)        
<tr>            
    <td hidden><input type="number" name="ejercicio_calentamiento[{{$index}}][]" value="{{$exercise->id}}"></td>                  
    <td>{{ $exercise->name }}</td>                  
    <td class="center"><input type="number" name="t_calentamiento[{{$index}}][]"></td>
    <td class="center"><a title="Quitar"  class="quitar btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a></td>
</tr>        
@endforeach                 

@else
<tr>No existen ejercicios de calentamiento</tr>
@endif

<!--
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
</script>-->
