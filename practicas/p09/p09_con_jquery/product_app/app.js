// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
};

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
}
$(document).ready(function () {
    
    listarProductos();

    //Funcion para listar los productos existentes
    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function (response) {
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(producto => {
                    template += `
                <tr>
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td>
                    <li>Precio: $${producto.precio}</li>
                    <li>Marca: ${producto.marca}</li>
                    <li>Modelo: ${producto.modelo}</li>
                    <li>Unidades: ${producto.unidades}</li>
                    <li>Detalles: ${producto.detalles}</li>
                    </td>
                </tr>
                `
                });
                $('#products').html(template);
            }
        });
    }
});
