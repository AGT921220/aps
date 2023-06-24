$(document).ready(function() {
    // Manejar el evento del botón de carga
    $('#uploadButton').click(function() {
      // Obtener la lista de archivos seleccionados
      var files = $('#xmlFileInput').get(0).files;
  
      // Crear un objeto FormData
      var formData = new FormData();
  
      // Agregar cada archivo a FormData
      for (var i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
      }
  
      // Realizar la solicitud AJAX
      $.ajax({
        url: 'http://ejemplo.com/upload',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log('Archivos subidos correctamente.');
        },
        error: function(xhr, status, error) {
          console.error('Error al subir los archivos:', error);
        }
      });
    });
  });
  