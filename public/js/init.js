$( document ).ready(function(){
    $(".button-collapse").sideNav();
    $('.modal').modal();

    //    datepicker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    //    para corregir el css de la paginacion
    $(".pagination li").addClass( "waves-effect" );
    var n = $(".pagination li.active span").html();
    $(".pagination li.active").html("<a>"+n+"</a>") ;

});


$( ".fila" ).click(function() {
    $(".check").prop('checked', false);
    $(".opc").removeClass("disabled");
    var mychek = $("#check_"+$( this ).attr('id') );
    if(mychek.is(':checked'))
        mychek.prop('checked', false);
    else
        mychek.prop('checked', true);

});