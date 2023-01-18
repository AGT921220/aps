
$(document).on('click','.sync_promo_products',function(event) {
    Swal.fire(
        'Sincronizando',
        'Sincronizando Productos!',
        'info'
    )
    
    Swal.showLoading();
});



$(document).on('click','.sync_promo_products_exists',function(event) {
    Swal.fire(
        'Sincronizando',
        'Sincronizando Existencias!',
        'info'
    )
    
    Swal.showLoading();
});