Swal.fire(
    'Cargando',
    'Cargando datos!',
    'info'
)

Swal.showLoading();

$(document).ready(function() {


    buttons=[
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: ':visible'
            }
        }
      ];



    // Setup - add a text input to each footer cell
    $('#datatable tfoot th').each( function () {
        var title = $(this).text();

        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );
 
    // DataTable
    
    var table = $('#datatable').DataTable({
        language:{
            url: "/js/datatables-es.json"
          },    
        initComplete: function () {


            $('#datatable').attr('style','display: inline-table !important');

            setTimeout(function(){ 
                swal.close();}, 500);

            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        lengthMenu: [ [10, 25, 50, 100, 300, -1], [10, 25, 50, 100, 300, "All"] ],
        dom: 'Blrtip',
        buttons: buttons,
    });
 
} );
