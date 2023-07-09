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


    $('.quotation_tbody').html('')
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
                    description: item.description,
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
        $('.image_product_value').val(selectedItem.image)
        // Aquí puedes agregar tu lógica personalizada para manejar la selección del elemento
    });

});



$('.check_catalog').change(function () {
    let check = $(this).is(':checked')

    if (check) {
        $('.product_catalog_container').show()
        $(".clave").prop("disabled", true);
        return
    }

    $('.product_catalog_container').hide()
    $(".clave").prop("disabled", false);
    $('.product_id').val(null)
    $('.image_product_value').val(null)
    $('.clave').val(null)
});


$('.quantity,.unit_price').change(function () {
    let quantity = $('.quantity').val()
    let unitPrice = $('.unit_price').val()
    $('.sub_total').val(quantity * unitPrice)
});



$('.add_poduct').click(function () {

    let productId = $('.product_id').val()
    let clave = $('.clave').val()
    let description = $('.description').val()
    let quantity = $('.quantity').val()
    let unitPrice = $('.unit_price').val()
    let image = $('.image_product_value').val()

    if ($('.check_catalog').is(':checked') && !productId) {
        Swal.fire(
            'Error',
            'Selecciona un producto!',
            'info'
        )
        return
    }

    if (!clave) {
        Swal.fire(
            'Error',
            'La Clave debe tener valor!',
            'info'
        )
        return
    }
    if (!quantity) {
        Swal.fire(
            'Error',
            'La cantidad debe tener valor!',
            'info'
        )
        return
    }
    if (!unitPrice) {
        Swal.fire(
            'Error',
            'El precio unitario debe tener valor!',
            'info'
        )
        return
    }

    let imgRender = image ? '<img src="' + image + '" style="width:100px;height:100px;">' : 'Sin Imágen'
    $('.quotation_tbody').append(
        '<tr class="quotation_detail" data-product="' + productId + '" data-clave=' + clave + ' data-quantity=' + quantity + ' data-description=' + description + ' data-unit_price=' + unitPrice + '>'
        + '<td>' + clave + '</td>'
        + '<td>' + quantity + '</td>'
        + '<td>' + description + '</td>'
        + '<td> $' + unitPrice + '</td>'
        + '<td> $' + (quantity * unitPrice).toFixed(2) + '</td>'
        + '<td>' + imgRender + '</td>'
        + '<td><input type="button" class="btn btn-danger form-group mb-2 delete_quotation_detail" value="Eliminar"></td>'
        + '</tr>'
    )
});



$(document).on('click', '.delete_quotation_detail', function () {
    $(this).parent().parent().remove()
});

// $(document).on('submit', '.quotation_form', function (e) {
    $(document).on('click', '.add_quotation_btn', function (e) {

    e.preventDefault()
    var quotationArray = [];

$('.quotation_detail').each(function() {
    var productId = $(this).data('product');
    var clave = $(this).data('clave');
    var quantity = $(this).data('quantity');
    var description = $(this).data('description');
    var unitPrice = $(this).data('unit_price');

    var quotationObject = {
        product: productId,
        clave: clave,
        quantity: quantity,
        description: description,
        unit_price: unitPrice
    };

    quotationArray.push(quotationObject);
});

if(quotationArray.length==0)
{
    Swal.fire(
        'Error',
        'Afrega una partida!',
        'info'
    )
    return
}

    // $.each(quotationArray, function(key, value) {
    //     console.log(key)
    //     console.log(value)
    // });
    let quotations = JSON.stringify(quotationArray)

    var arregloObjetos = [
        { nombre: 'Objeto 1', valor: 1 },
        { nombre: 'Objeto 2', valor: 2 },
        { nombre: 'Objeto 3', valor: 3 }
      ];
      
      var jsonString = JSON.stringify(arregloObjetos);
      console.log(jsonString)
      console.log(quotations)
    // $('.quotation_form').append('<input type="text" name="quotation_details[]" value="' + quotations + '">')
    // // $('.quotation_form').append('<input type="text" name="quotation_details[]" value="' + jsonString + '">');
    $('#quotationInput').val(quotations);
    $('.quotation_form').submit()

});

