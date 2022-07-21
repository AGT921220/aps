console.log("ready!");

var token = $('#csrf_token').val();

grafica_productos(token);






function grafica_productos(token) {
    $.ajax('graficas/productos', {
        data: { "_token": token },
        type: 'post',
        dataType: 'json', // type of response data
        success: function(response, status, xhr) { // success callback function
            var labels = [];
            var cantidad = [],
                precio = [];
            $.each(response, function(index, value) {
                cantidad.push(value.cantidad);
                precio.push(value.precio);
                labels.push(value.name);
            });

            if (response.length >= 0) {
                print_cant(labels, cantidad);
                print_precio(labels, precio);
                $('#productos_chart_cant,#productos_chart_price').css('max-width', '400px');
            }
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 

        }
    });
}


function print_cant(labels, data) {
    new Chart(document.getElementById("productos_chart_cant"), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: data
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad de productos'
            }
        }
    });

}

function print_precio(labels, data) {
    new Chart(document.getElementById("productos_chart_price"), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: "Precio",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: data
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Precio de productos'
            }
        }
    });

}