$(document).ready(function() {
    //calcular precio
    $('.cantidad_d,.precio_d').on('input', function() {
        var total = parseFloat($('.cantidad_d').val()) * parseFloat($('.precio_d').val());
        if(isNaN(total)) {
            total=0;
        }        
        $('.total_d').val(total);
    });

    //Generar detalle de proyecto
    $( ".form_generar" ).submit(function( event ) {
        event.preventDefault();
        Swal.fire(
            'Guardando',
            'Guardando Partida!',
            'info'
        )

        Swal.showLoading();
        addProyectoDetalle();
      });
      //Eliminar proyecto
      $(document).on('click','.delete_proyecto_d',function(event) {
        Swal.fire(
            'Eliminando',
            'Eliminando Partida!',
            'info'
        )

        Swal.showLoading();
        deleteProyectoDetalle($(this).data('id'));
     });

     //Generar Concurso
      $(document).on('click','.create_concurso',function(event) {
        Swal.fire(
            'Generando',
            'Generando concurso!',
            'info'
        )

        Swal.showLoading();

        
        generateConcurso($(this).data('id'));
     });

});


function addProyectoDetalle(){

    var inputs = $('.form_generar').find("select,input");
    var items = {};


    inputs.each(function() {
        if (this.type != 'submit') {
            items[this.name]=this.value;
        }
    });
    console.log(items);
    var token = $('#csrf_token').val();

    $.ajax('/proyectos/ajax/detalle/agregar', {
        data: { "_token": token, data: items },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            if(response.success){
                location.reload();
            }else{
                Swal.fire(
                    'Error',
                    response.error,
                    'error'
                )
            }
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback
        }
    });
}


function deleteProyectoDetalle(id){

    var token = $('#csrf_token').val();
    console.log(id);
    $.ajax('/proyectos/ajax/detalle/eliminar', {
        data: { "_token": token, id: id },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            if(response.success){
                location.reload();
            }else{
                Swal.fire(
                    'Error',
                    response.error,
                    'error'
                )
            }

        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}

function generateConcurso(id){

    var token = $('#csrf_token').val();

    $.ajax('/proyectos/ajax/generar', {
        data: { "_token": token, id: id },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            if(response.success){
                window.location.href = '/proyectos';
            }else{
                Swal.fire(
                    'Error',
                    response.error,
                    'error'
                )
            }

        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}