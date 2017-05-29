@if(! $exercises->isEmpty())

@foreach($exercises as $exercise)
@if($exercise->exercise->training_phase_id == 3)      
<tr>            
    <td class="oculto" hidden><input type="number" name="ejercicio_estiramiento[{{$index}}][]" value="{{$exercise->exercise->id}}"></td>                  
    <td>{{ $exercise->exercise->name }}</td>                  
    <td class="center"><input type="number" class="t_estiramiento" value="" name="t_estiramiento[{{$index}}][]"></td>
    <td class="center"><a title="Quitar"  class="quitar btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a></td>
</tr>  
@endif       
@endforeach                 

@else
<tr>No existen ejercicios de estiramiento</tr>
@endif
<script>
$(document).ready(function(){
    var each_time = parseInt({{$time}}) / $('.'+{{$index}}+'.tabla_estiramiento tbody .t_estiramiento').length;
    $('.'+{{$index}}+'.tabla_estiramiento tbody .t_estiramiento').each(function(){
        $(this).val(each_time);
    });
    
});
</script>
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
