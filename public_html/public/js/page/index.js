$( ".linking" ).click(function() {
    var target = $(this).data('id');
    var nav = $('.navbar').height()*1.2;

    $([document.documentElement, document.body]).animate({
        scrollTop: $("#"+target).offset().top-nav
    }, 2000);
    $( "#contacto" ).scroll();

});
