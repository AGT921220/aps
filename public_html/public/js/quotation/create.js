// $('.catalog_clave').on('input', fetchProducts);

// // Función para realizar la petición cuando se escriben al menos 23 letras
// function fetchProducts(event) {
//   const value = event.target.value;

//   if (value.length >= 3) {
//     $.ajax({
//       url: '/api/products',
//       method: 'GET',
//       data: { "item_code": value },
//       dataType: 'json',
//       // Agrega aquí cualquier otro encabezado necesario
//       headers: {
//         'Content-Type': 'application/json'
//       },
//       success: function (data) {
//         console.log(data);
//       },
//       error: function (error) {
//         console.error('Error:', error);
//       }
//     });
//   }
// }


$(document).ready(function () {


    $(".clave").prop("disabled", true);

    $('.catalog_clave').select2({
        placeholder: 'Seleccione una opción',
        minimumInputLength: 3,
        ajax: {
            url: '/api/products',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    item_code: params.term
                };
            },
            processResults: function (data) {
                const results = data.data.map(item => ({
                    product_id: item.id,
                    id: item.item_code,
                    text: item.item_code + ' - ' + item.name,
                    description:item.description,
                    image: item.images_format[0]
                }));

                return {
                    results: results
                };
            },
            cache: true
        },
        templateResult: function (result) {
            if (!result.id) {
                return result.text;
            }

            const $option = $('<span></span>');
            if (result.image) {
                const $image = $('<img style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">');
                $image.attr('src', result.image);
                $option.append($image);
            }

            $option.append(result.text);

            return $option;
        }
    }).on('select2:select', function (e) {
        const selectedItem = e.params.data;
        console.log('Elemento seleccionado:', selectedItem);
        $('.clave').val(selectedItem.id)
        $('.product_id').val(selectedItem.product_id)
        $('.description').val(selectedItem.text)
        // Aquí puedes agregar tu lógica personalizada para manejar la selección del elemento
    });

});



$('.check_catalog').change(function () {
   let check = $(this).is(':checked')

   if(check)
   {
    $('.product_catalog_container').show()
    $(".clave").prop("disabled", true);
    return
   }

   $('.product_catalog_container').hide()
   $(".clave").prop("disabled", false);


});



$('.add_poduct').click(function () {

});
