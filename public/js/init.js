$( document ).ready(function(){


    //barra lateral
    $(".button-collapse").sideNav({
        menuWidth: 240,
        edge: 'left', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true 
    });

    //modales
    $('.modal').modal();

    //    datepickers
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    //selects
    $(document).ready(function() {
        $('select').material_select();
    });

    //    para corregir el css de la paginacion
    $(".pagination li").addClass( "waves-effect" );
    var n = $(".pagination li.active span").html();
    $(".pagination li.active").html("<a>"+n+"</a>") ;

    // dropdowns
    $(".dropdown-button").dropdown({
        hover: true, // Activate on hover        
        belowOrigin: true, // Displays dropdown below the button
    });

    //datatables
    $('.datatable').DataTable();




});





// NProgress
if (typeof NProgress != 'undefined') {
    $(document).ready(function () {
        NProgress.start();
    });

    $(window).load(function () {
        NProgress.done();
    });
}

//toastr
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "tapToDismiss": true
}

