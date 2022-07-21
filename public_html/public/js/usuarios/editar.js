$(document).ready(function() {
 
    $('#new_password').click(function(){

        if($(this).is(":checked")){
            $('.new_pass').html('<div class="form-group"> <label>Contraseña</label> <input type="password" name="pwd1" placeholder="Contraseña" class="form-control mb-2" required=""/> </div> <div class="form-group"> <label>Confirmar contraseña</label> <input type="password" name="pwd2" placeholder="Contraseña" class="form-control mb-2" required=""/> </div>')
        }else{
            $('.new_pass').html('');
        }

    });

});
