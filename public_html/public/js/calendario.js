$(document).ready(function() {
        $('.servicio_item_principal').select2();

    calcular_tiempo_servicio();
    console.log('Calendario listo');
});

//AÑADIR SERVICIO
$(document).on("click", ".add_servicio", function() {
    var select_servicio = $('.servicio_select_clone').html();
    $('.servicios').append('<div class="form-group servicio_select">' + select_servicio + ' <div class="btn btn-danger delete_servicio"></r>Eliminar <i class="fa fa-trash" aria-hidden="true"></div></i></div>');
    $('.new_select_servicio').removeClass('new_select_servicio');
    $( ".servicios .form-group" ).last().addClass('new_select_servicio');
    $('.new_select_servicio select').select2();

    //    $( ".servicios:last-child select" ).select2();
//    $('.servicio_select_secundario').select2();

    calcular_tiempo_servicio();
});
//ELIMINAR SERVICIO
$(document).on("click", ".delete_servicio", function() {
    $(this).parent().remove();
    calcular_tiempo_servicio();
});


//MODIFICAR SERVICIOS
$(document).on("change", ".servicio_item", function() {
    calcular_tiempo_servicio();
});

$(document).on("change", ".cita_fecha, .estilista", function() {
    buscar_citas();
});


//AGREGAR CITA
$(document).on("click", ".agregar_cita", function() {


    var hora = $('.hora_disponible').val();
    Swal.fire({
        title: 'Agregar Cita',
        text: "Desea agregar cita a las " + hora + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {

            var fecha = $('.cita_fecha').val();
            var estilista = $('.estilista').val();
            var horas = $('.duracion_horas').val();
            var minutos = $('.duracion_minutos').val();

            agregar_cita(hora, estilista, fecha, horas, minutos);
        }
    })

});


$(document).on("change", ".test", function() {

});


































function calcular_tiempo_servicio() {
    var inputs = $('.servicios').find("select");
    var servicios = [];
    Swal.fire(
        'Calculando',
        'Calculando tiempo de servicios!',
        'info'
    )
    Swal.showLoading();

    inputs.each(function() {
        if (this.type != 'submit') {

            servicios.push(this.value);

        }
    });

    var token = $('#csrf_token').val();

    $.ajax('/ajax/servicios/tiempo', {
        data: { "_token": token, servicios: servicios },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function

            var servicios = response.servicios;
            var imagen = servicios.imagen;
            console.log(servicios);

            $(".servicio_item").each(function() {
                $(this).parent().children('.img_servicio').html('<img class="profile_image_show" style="width:100px;" src="/' + imagen[0] + '">');
                imagen.shift();
            });


            $('.duracion').val(response.duracion);
            $('.precio').val('$' + response.precio + ' pesos.');

            $('.duracion_horas').val(response.horas);
            $('.duracion_minutos').val(response.minutos);
            $('.precio_input').val(response.precio);

            buscar_citas();

        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });


}

//function buscar_citas(fecha, horas, minutos, estilista) {
function buscar_citas() {

    var fecha = $('.cita_fecha').val();
    var estilista = $('.estilista').val();
    if (fecha == null || fecha == '') {
        Swal.fire(
            'Error',
            'Seleccione una fecha!',
            'error'
        )
        return false;
    }

    var horas = $('.duracion_horas').val();
    var minutos = $('.duracion_minutos').val();

    var token = $('#csrf_token').val();
    Swal.fire(
        'Buscando',
        'Buscando citas disponibles!',
        'info'
    )
    Swal.showLoading();

    $.ajax('/ajax/citas/buscar', {
        data: { "_token": token, fecha: fecha, horas: horas, minutos: minutos, estilista: estilista },
        type: 'post',
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            console.log(response);

            if (response == 0) {
                $('.citas_disponibles').html('<label>Horas disponibles</label><p>Sin horarios dispobibles</p>');
                Swal.close();

                Swal.fire(
                    'Sin Disponibilidad',
                    'No hay citas disponibles: Por favor elige otro día u otro empleado',
                    'info'
                )

                return false;
            }

            $('.citas_disponibles').html('<label>Horas disponibles</label><select class="form-control hora_disponible"></select>');
            var valor_hora, am_pm;
            $.each(response, function(key, value) {
                valor_hora = value;
                am_pm = ' AM';
                if (value.substr(0, 2) >= 13) {
                    valor_hora = (value.substr(0, 2) - 12) + value.substr(2);
                    am_pm = ' PM';
                }
                if (value.substr(0, 2) == 12) {
                    am_pm = ' PM';
                }

                $('.hora_disponible').append('<option value="' + value + '">' + valor_hora + am_pm + '</option>');
            });
            $('.citas_disponibles').append('<a class="btn btn-success agregar_cita">Agendar Cita</a>');

            Swal.close();


        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback
            Swal.close();
            Swal.fire(
                'Error',
                'Ha ocurrido un error!',
                'error'
            )

        }
    });

}

function agregar_cita(hora, estilista, fecha, horas, minutos) {


    var inputs = $('.servicios').find("select");
    var servicios = [];

    inputs.each(function() {
        if (this.type != 'submit') {
            servicios.push(this.value);
        }
    });

    var token = $('#csrf_token').val();
    Swal.fire(
        'Agregando',
        'Agregando Cita!',
        'info'
    )
    Swal.showLoading();

    $.ajax('/ajax/citas/agregar', {
        data: { "_token": token, fecha: fecha, horas: horas, minutos: minutos, estilista: estilista, hora: hora, servicios: servicios },
        type: 'post',
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function


            Swal.close();
            if (response.success) {

                Swal.fire(
                    'Cita Agregada',
                    'Su cita se agrego correctamente!',
                    'success'
                )
                setTimeout(function(){
                    buscar_citas();
                 }, 5000);


            } else {
                Swal.fire(
                    'Error',
                    response.error + '!',
                    'error'
                )

            }

        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}
