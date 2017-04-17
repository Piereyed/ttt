@if(! $exercises->isEmpty())

@foreach($exercises as $exercise)
@if($exercise->exercise->training_phase_id == 3)      
<tr>            
    <td hidden><input type="number" name="ejercicio_estiramiento[{{$index}}][]" value="{{$exercise->exercise->id}}"></td>                  
    <td>{{ $exercise->exercise->name }}</td>                  
    <td class="center"><input type="number" name="t_estiramiento[{{$index}}][]"></td>
    <td class="center"><a title="Quitar"  class="quitar btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a></td>
</tr>  
@endif       
@endforeach                 

@else
<tr>No existen ejercicios de estiramiento</tr>
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
