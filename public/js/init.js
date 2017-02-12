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



    //validate
    $("#crear_cliente").validate({
        rules:{
            name:"required",
            lastname1:"required",
            lastname2:"required",
            dni:{
                required: true,
                minlength:8,
                maxlength:8,
                digits: true
            },
            celular:{
                required:true,
                digits:true,
                minlength:6,
                maxlength:30
            },
            email:{
                required:true,
                email:true
            },


        },
        messages:{
            name: "Debe ingresar su nombre",
            lastname1: "Debe ingresar su apellido paterno",
            lastname2: "Debe ingresar su apellido materno",
            dni:{
                required: "Debe ingresar su DNI", 
                minlength: "Debe tener 8 dígitos", 
                maxlength: "Debe tener 8 dígitos", 
                digits: "El DNI debe tener sólo números"
            } ,
            celular: {
                required: "Debe ingresar su número de teléfono",   
                digits: "Ingrese un teléfono válido"  ,
                minlength:"El número debe tener mínimo 6 dígitos",
                maxlength:"El número es muy grande"
            },
            email: {
                required: "Debe ingresar su correo",
                email: "Ingrese un correo válido"
            },
            sede:"Elija una sede" ,
            programa:"Elija un programa" ,

        }
    });
//fin validate

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


