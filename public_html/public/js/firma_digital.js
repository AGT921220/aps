var canvas;
var w = $('.firma_container').width();
$('canvas').attr('width', w);

canvas = window._canvas = new fabric.Canvas('canvas');
canvas.backgroundColor = 'white';
canvas.isDrawingMode = 0.5;
canvas.freeDrawingBrush.color = "black";
canvas.freeDrawingBrush.width = 2;
canvas.renderAll();



$('.clearSign').click(function() {
    canvas.clear();
    canvas.backgroundColor = 'white';
    console.log('as');
    return false;
});

canvas.on('mouse:up', function(evn) {
    var point = canvas.getPointer(evn.e);
    console.log(point);
    var img = convertCanvasToImage(canvas);
    //    $('.firma_digital_value_img').attr('src', img);
    $('.firma_digital_value').val(img);
});


function convertCanvasToImage(canvas) {
    var image = new Image();
    image.src = canvas.toDataURL("image/png");
    return image.src;
}