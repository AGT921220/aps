
  $(document).ready(function() {
    //calcular precio
    $('.monto').on('input', function() {
        var iva = parseFloat($(this).val()*0.16);
        $('.iva').val(iva.toFixed(2))
        var total = parseFloat($(this).val())+iva
         total = parseFloat(total).toFixed(2);

        $('.total').val(total)
    });
 
 
 
  });
