$(document).ready(function() {
    console.log('Calendario Ver Citas');



    Swal.fire(
        'Cargando',
        'Cargando calendario!',
        'info'
    )
    Swal.showLoading();


    var token = $('#csrf_token').val();

    $.ajax('/ajax/citas/calendario', {
        data: { "_token": token },
        type: 'post',
        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            Swal.close();
            if (response.success) {
                console.log(response.success);
                var events = [];
                for (var i = 0; i < response.success.length; i++) {

                    events.push({
                        group: response.success[i].estilista,

                        title: response.success[i].cliente,
                        start: response.success[i].fecha,
                        eventColor: '#000000',
                    })
                }


                var calendarEl = document.getElementById('calendario_container');

                calendar = new FullCalendar.Calendar(calendarEl, {

                    plugins: ['interaction', 'dayGrid', 'timeGrid'],
                    header: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    locale: 'es',
                    events: events,
                });

                calendar.render();


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







});




function renderizar_calendario() {


}
