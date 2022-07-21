//$("#imagen_profile").change(function(e) {
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

console.log('REGISTRO');