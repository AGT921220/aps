$(document).on("click", "#new_password", function() {
    var new_pass = $(this).prop('checked');

    if (new_pass) {
        $('.new_pass').html('<div class="form-group"> <label>Contraseña Nueva</label> <input type="password" name="pwd1" placeholder="Contraseña" class="form-control mb-2 pwd1" required=""/> </div> <div class="form-group"> <label>Confirmar contraseña Nueva</label> <input type="password" name="pwd2" placeholder="Contraseña" class="form-control mb-2 pwd2" required=""/> </div>');

    } else {
        $('.new_pass').html('');
    }

});

$(document).on("change", "#imagen_profile", function() {
    var input = this;
    console.log('profile_image_show');
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.profile_image_show').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
});




$(document).on("click", ".profile_image_show", function() {

    $('#imagen_profile').trigger('click');

});
