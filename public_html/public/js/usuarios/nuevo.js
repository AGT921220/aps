
$(document).ready(function() {
 
    $('#user_rol').change(function(){
        if($(this).val()=='Subcontratista'){
            $('#contratista_data').html('<div class="form-group"> <label>Empresa</label> <input type="text" name="company" placeholder="Nombre de empresa" class="form-control mb-2" required="" /> </div> <div class="form-group"> <label>RFC</label> <input type="text" name="rfc" placeholder="RFC" class="form-control mb-2" required="" /> </div> <div class="form-group"> <label>Registro Patronal</label> <input type="text" name="patronal" placeholder="Registro patronal" class="form-control mb-2" required="" /> </div>');
        }else{
            $('#contratista_data').html('');
        }
    });

});
