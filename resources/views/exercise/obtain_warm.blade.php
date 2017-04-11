@if(! $exercises->isEmpty())
<table class="responsive-table bordered highlight" name="table-objs">
    <thead>
        <tr>
            <th class="center" data-field="options">Quitar</th>
            <th data-field="name">Nombre</th>
            <th class="center" data-field="phase">Tiempo(seg)</th>

        </tr>
    </thead>

    <tbody>
        @foreach($exercises as $exercise)        
        <tr>
            <!--
<td class="opcion center">
<p>
<input type="checkbox" class="filled-in" id="{{ $exercise->id }}" />
<label for="{{ $exercise->id }}"></label>
</p>
</td>
-->
            <td class="center"><a id="{{ $exercise->id }}" class="waves-effect red waves-light btn"><i class="material-icons">delete</i></a></td>
            <td>{{ $exercise->name }}</td>                  
            <td class="center"><input type="number" name=""></td>              
        </tr>        
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