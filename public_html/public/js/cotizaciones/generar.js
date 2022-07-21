
var detallesProyectos ={};
$(document).ready(function() {
    console.log('Generar Cotización');
    //Obtiene Partidas
    var catalogo_id = $('#catalogo_select').val();
    var proyecto_id = $('#proyecto_id').val();
    if(catalogo_id==undefined){
        return false;
    }
    getPartidas(catalogo_id,proyecto_id);

    //Obtiene Partidas
    $('#catalogo_select').on('change', function() {
        var catalogo_id = $('#catalogo_select').val();
        var proyecto_id = $('#proyecto_id').val();
        getPartidas(catalogo_id,proyecto_id);
    });  
    //Obtiene Detalles
    $('#detalle_proyecto_select').on('change', function() {
        var detalle = $('#detalle_proyecto_select').val();
        selectDetalleProyecto(detalle);
    });

    //Calcula precio total
    $('.precio_d').on('input', function() {
        var total = $('.cantidad_d').val()*$('.precio_d').val();
        if(isNaN(total)) {
            total=0;
        }        
        $('.total_d').val(total);
    });

      //Agregar Detalle Cotización
      $(document).on('click','.cotizar_partida',function(event) {
        var proyecto_id = $('#proyecto_id').val();
        var cotizacion_id = $('#cotizacion_id').val();
        var precio = $('.precio_d').val();
        var detalle_proyecto_id =$('#detalle_proyecto_select').val();

        if(isNaN(precio)) {
            precio=0;
        }        
        if(precio<=0){
            Swal.fire(
                'Dato incorrecto',
                'Captura un número mayor a 0.',
                'info'
            )
            return false;
        }
        Swal.fire(
            'Guardando',
            'Guardando Detalle de Cotización!',
            'info'
        )

        Swal.showLoading();
        addDetalleCotizacion(proyecto_id,cotizacion_id,detalle_proyecto_id,precio);        
    });



});


    //Eliminar Detalle Cotización
    $(document).on('click','.delete_cotizacion_d',function() {
    Swal.fire(
        'Eliminando',
        'Eliminando Detalle!',
        'info'
    )
    Swal.showLoading();

    deleteCotizacionDetalle($(this).data('id'));
    });


function getPartidas(catalogo_id,proyecto_id){

    var token = $('#csrf_token').val();

    $.ajax('/proyectos/ajax/detalle/obtener', {
        data: { "_token": token, catalogo_id: catalogo_id,proyecto_id:proyecto_id },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            if(response.success){
                var data = response.success;
                $('#detalle_proyecto_select').html('');
                $.each(data, function(key, value) {
                    detallesProyectos[value.id]=value;
                    $('#detalle_proyecto_select').append('<option value="'+value.id+'">('+value.clave+') '+value.descripcion+'</option>');
                });

                var detalle = $('#detalle_proyecto_select').val();
                selectDetalleProyecto(detalle);

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



function selectDetalleProyecto(id){
    
    var detalles = detallesProyectos[id];
    $('.descripcion_d').val(detalles.descripcion);
    $('.clave_d').val(detalles.clave);
    $('.cantidad_d').val(detalles.cantidad);
    $('.unidad_d').val(detalles.unidad);
    var total = detalles.cantidad*$('.precio_d').val();
    if(isNaN(total)) {
        total=0;
    }        
    $('.total_d').val(total);

}

function addDetalleCotizacion(proyecto_id,cotizacion_id,detalle_proyecto_id,precio){

    var token = $('#csrf_token').val();

    $.ajax('/cotizaciones/ajax/detalle/agregar', {
        data: { "_token": token, cotizacion_id: cotizacion_id,proyecto_id:proyecto_id,precio:precio,detalle_proyecto_id:detalle_proyecto_id },
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

function deleteCotizacionDetalle(id){

    var token = $('#csrf_token').val();
    console.log(id);
    $.ajax('/cotizaciones/ajax/detalle/eliminar', {
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
