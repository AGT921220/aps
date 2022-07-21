$('.carousel-item', '.multi-item-carousel').each(function(){
    var next = $(this).next();
    if (! next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }).each(function(){
    var prev = $(this).prev();
    if (! prev.length) {
      prev = $(this).siblings(':last');
    }
    prev.children(':nth-last-child(2)').clone().prependTo($(this));
  });



//   function onSubmit(token) {
//     document.getElementById("contactForm").submit();
//   }
$(document).on("submit", "#contactForm", function(e) {
    e.preventDefault();
    var nombre = $('#name').val();
    var email = $('#email').val();
    var telefono = $('#phone').val();
    var mensaje = $('#message').val();
    var token = $('#google-response-token').val();
    if(nombre==''||email==''||telefono==''||mensaje==''){

    }
    contactSend(nombre,email,telefono,mensaje,token);
    
})

$( document ).ready(function() {

    var nav = $('.navbar').height()*1.2;
    $('.wrapper_Content').css("margin-top", nav);

    Swal.fire(
        'Cargando',
        'Cargando Contenido!',
        'info'
    )
    Swal.showLoading();
    loadHome();

    //solicitarCotizacion('producto','cantidad','telefono','email','nombre','descripcion')


    grecaptcha.ready(function() {
        grecaptcha.execute('6LcD3YAaAAAAAI-ZlZjLwc0DjHpuPW1-o9GGGcLh', {action: 'submit'}).then(function(token) {
            $('#google-response-token').val(token);
            // Add your logic to submit to your backend server here.
        });
      });
  

});

//Boton Home
$(document).on("click", ".btn_home,#logo_aps", function() {

    $('.navbar-toggler').trigger('click');
    Swal.fire(
        'Cargando',
        'Cargando Contenido!',
        'info'
    )
    Swal.showLoading();

    loadHome();

});


//Boton Productos
$(document).on("click", ".subcategory_product", function() {
    var subcategory = $(this).data('id');
    $('.navbar-toggler').trigger('click');
    Swal.fire(
        'Cargando',
        'Cargando Contenido!',
        'info'
    )
    Swal.showLoading();

    loadProducts(subcategory);

});

//Cotizar
$(document).on("click", ".btn_cotizar", function() {
    cotizar()
});

$( ".linking" ).click(function() {
    var target = $(this).data('id');
    var nav = $('.navbar').height()*1.2;

    $([document.documentElement, document.body]).animate({
        scrollTop: $("#"+target).offset().top-nav
    }, 2000);
    $( "#contacto" ).scroll();

});

//Cargar Home
function loadHome(){

    $('.wrapper_Content').html('');
    $('.wrapper_Content').html('<div class="containerw productContainer"><div class="row carouselContent mt-5 mb-5"></div>    </div>     ');

    var token = $('#_token').val();

    $.ajax('/api/inicio', {
        data: { "_token": token },
        type: 'post',
//        async: false,
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function

            if(response.success.titulo.length!=0){
                $('.productContainer').prepend('<h4>'+response.success.titulo+'</h4');
            }
            if(response.success.titulo2.length!=0){
                $('.productContainer').append('<h4>'+response.success.titulo2+'</h4');
            }

            if(response.success.carousel){

                $('.carouselContent').html('<div id="carouselExampleCaptions" class="carousel slide show-neighbors" data-ride="carousel">'
                +'<ol class="carousel-indicators"></ol>'
                +'<div class="carousel-inner"></div>'
                +'<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>'
                )


                var active =' active';
                $.each(response.success.carousel, function(key, value) {
                    if(key>0){active='';}
                    $('.carousel-indicators').append('<li data-target="#carouselExampleCaptions" data-slide-to="'+key+'"></li>');


                    $('.carousel-inner').append('<div class="carousel-item '+active+'">'
                    +'<div class="item__third">'
                    +'  <img src="'+value+'" class="d-block w-100" alt="">'
                    +'</div>');
                
                });             
                
                $('.carousel').carousel({
                    interval: 5000
                  })


                  if(response.success.imagenes.length!=0){
                    $('.productContainer').append('<div class="mt-5 mb-5"><div class="row imgContainer "></div>        ');
                    $.each(response.success.imagenes, function(key, value) {
                        
                        $('.imgContainer').append('<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-5">'
                        +'<img src="'+value+'" class="img-responsive">'
                        +'</div>')
                    });
                }

                if(response.success.titulo3.length!=0){
                    $('.productContainer').append('<h4 class="mt-5">'+response.success.titulo3+'</h4');
                }

                if(response.success.imagenes2.length!=0){
                    $('.productContainer').append('<div class="mt-5 mb-5"><div class="row imgContainer imgContainer2"></div>        ');
                    $.each(response.success.imagenes2, function(key, value) {
                        
                        $('.imgContainer2').append('<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-5">'
                        +'<img src="'+value+'" class="img-responsive">'
                        +'</div>')
                    });
                }


                setTimeout(function(){
                    Swal.close();
                 }, 500);
    

            }
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });


}
//Cargar Productos
function loadProducts(subcategory){

    var token = $('#_token').val();

    $.ajax('/api/subcategory/productos', {
        data: { "_token": token, subcategory: subcategory },
        type: 'post',
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function

            $('.wrapper_Content').html('<div class="containerw productContainer"> <h4>'+response.success.subcategoria+'</h4><div class="row imgContainer"></div>        ');
            $.each(response.success.productos, function(key, value) {

                $('.imgContainer').append('<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-5">'
                +'<img src="'+value.imagen+'" class="img-responsive">'
                +'</div>')
            });

            setTimeout(function(){
                Swal.close();
             }, 500);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}



function cotizar(){

    Swal.fire({

        icon: 'info',
        html:
          '<h4>Por favor llena todos los campos</h4><div class="form-group mt-3"><label><span class="cotiza_red">*(Obligatorio)</span>Producto ó Código</label> <input type="text" class="form-control producto_cotizar"> </div>' +
          '<div class="form-group"><label><span class="cotiza_red">*(Obligatorio)</span>Cantidad</label> <input type="number" class="form-control cantidad_cotizar"> </div>' +
          '<div class="form-group"><label><span class="cotiza_red">*(Obligatorio)</span>Teléfono</label> <input type="number" class="form-control telefono_cotizar"> </div>' +
          '<div class="form-group"><label><span class="cotiza_red">*(Obligatorio)</span>Correo</label> <input type="email" class="form-control email_cotizar"> </div>' +
          //          '<div class="form-group"><label>Descripción</label> <input type="text" class="form-control descripcion_cotizar"> </div>',
          '<div class="form-group"><label>Nombre o Empresa</label> <input type="text" class="form-control nombre_cotizar"> </div>' +  
          '<div class="form-group"><label>Descripción</label> <textarea class="swal2-textarea descripcion_cotizar"></textarea></div>',

          
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:'Solicitar',
        cancelButtonText:'Cancelar',
      })
      .then((result) => {
          console.log(result)
        if (result.value) {
            var producto = $('.producto_cotizar').val();
            var cantidad = $('.cantidad_cotizar').val();
            var telefono = $('.telefono_cotizar').val();
            var email = $('.email_cotizar').val();
            var nombre = $('.nombre_cotizar').val();
            var descripcion = $('.descripcion_cotizar').val();

            if(telefono==''||email==''||producto==''||cantidad==''||telefono==null||email==null||producto==null||cantidad==null){
                Swal.fire(
                    'Datos Incompletos',
                    'Por favor ingresa los datos obligatorios!',
                    'info'
                )
                return false;
            }

            Swal.fire(
                'Enviando',
                'Sus datos están siendo enviados para solicitar su cotización!',
                'info'
            )
            Swal.showLoading();
        
        solicitarCotizacion(producto,cantidad,telefono,email,nombre,descripcion)
        
        }
    })

}

function solicitarCotizacion(producto,cantidad,telefono,email,nombre,descripcion){

    var token = $('#_token').val();
    $.ajax('././mail/cotizacion.php', {
        data: { "_token": token, producto: producto, cantidad:cantidad,telefono:telefono,email:email,nombre:nombre,descripcion:descripcion },
        type: 'post',
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function

            //AQUI
            Swal.fire(
                response.title,
                response.message,
                response.success
            )
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}

function contactSend(nombre,email,telefono,mensaje,token){

//    var token = $('#_token').val();
    $.ajax('././mail/contact_me.php', {
        data: { "token": token, nombre: nombre, email:email,telefono:telefono,mensaje:mensaje},
        type: 'post',
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function

            //AQUI
            Swal.fire(
                response.title,
                response.message,
                response.success
            )
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback

        }
    });

}