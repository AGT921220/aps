
$(document).on("click", ".user-panel", function() {
    window.location.href = "/dashboard/perfil";

    
});

$(document).ready(function() {

        $('.select_2').select2();
    
    let heightFootet = $('.main-footer').height()
    let totalHeight = $('body').height()
    var windowHeight = $(window).height();
    console.log(totalHeight)
    console.log(windowHeight)

    $('.content-wrapper').height(totalHeight-heightFootet)
 

  });
