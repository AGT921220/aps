$(document).on("click", ".cita_cancelar", function() {
    console.log(2);

    Swal.fire({
        title: 'Eliminar Cita',
        text: "Desea eliminar cita?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            var cita = $(this).data('id');
            cancelar_cita(cita);
        }
    })

});


function cancelar_cita(cita) {
    Swal.fire(
        'Eliminando',
        'Eliminando cita!',
        'info'
    )
    Swal.showLoading();


    var token = $('#csrf_token').val();

    $.ajax('/ajax/citas/cancelar', {
        data: { "_token": token, cita: cita },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            Swal.close();
            if (response.success) {
                Swal.fire(
                    'Cancelada',
                    'Cita Cancelada!',
                    'info'
                ).then((result) => {
                    location.reload(true);
                })

                setInterval(function() { location.reload(true); }, 3000);

            } else {
                Swal.fire(
                    'Error',
                    'Ha ocurrido un error!',
                    'warning'
                )
            }

        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}