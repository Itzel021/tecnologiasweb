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
    $('#product-result').hide();//Ocultar el product-result
    listarProductos();//Cargar todos los productos existentes

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
    
    //Funcion para buscar productos
    $('#search').keyup(function (e) {
        if ($('#search').val()) {
            let search = $('#search').val();

            $.ajax({
                url: './backend/product-search.php',
                type: 'GET',
                data: { search },
                success: function (response) {
                    let productos = JSON.parse(response);
                    let template = '';
                    let template_table = '';

                    productos.forEach(producto => {
                        template += `<li>
                            ${producto.nombre}
                        </li>`
                    });

                    $('#container').html(template);
                    $('#product-result').show();

                    productos.forEach(producto => {
                        template_table += `
                            <tr productId="${producto.id}">
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
                    $('#products').html(template_table);
                }
            });
        }
    });
});
