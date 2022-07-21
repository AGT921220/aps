var calendar;
$(document).ready(function() {
    var estilista = $('.select_estilista').val();
    renderizar_calendario(estilista);
});

$(document).on("click", ".select_estilista_calendario", function() {
    var estilista = $('.select_estilista').val();
    renderizar_calendario(estilista);
});





function renderizar_calendario(estilista) {

    $('#calendario-container').html('<div id="calendario"></div>');
    var calendarEl = document.getElementById('calendario');

    calendar = new FullCalendar.Calendar(calendarEl, {

        plugins: ['interaction', 'dayGrid', 'timeGrid'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        navLinks: true, // can click day/week names to navigate views

        weekNumbers: true,
        weekNumbersWithinDays: true,
        weekNumberCalculation: 'ISO',

        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [{
            groupId: 1,
            title: 'Repeating Event',
            start: '2020-01-09T16:00:00'
        }, ]
    });

    calendar.render();

    $('.fc-left').children('button').text('Hoy');


}
