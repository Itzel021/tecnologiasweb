// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscar(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var palabra = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {

            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            
            if (Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let template = '';
                for (let i = 0; i < Object.keys(productos).length; i++) {
                    let descripcion = '';
                    descripcion += '<li>precio: $' + productos[i].precio + '</li>';
                    descripcion += '<li>unidades: ' + productos[i].unidades + '</li>';
                    descripcion += '<li>modelo: ' + productos[i].modelo + '</li>';
                    descripcion += '<li>marca: ' + productos[i].marca + '</li>';
                    descripcion += '<li>detalles: ' + productos[i].detalles + '</li>';

                    // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML

                    template += `
                        <tr>
                            <td>${productos[i].id}</td>
                            <td>${productos[i].nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                        
                    `;
                    
                }
                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("bsq="+palabra);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);

    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    //VALIDACION
    // Expresión regular para validar números enteros o decimales
    var regex = /^[0-9]+(\.[0-9]+)?$/;
     //Mostrar los errores
     var mensaje = document.getElementById('mensaje');
     //Crear un arreglo de todos los errores
     var errores = [];
    //Todos los datos estan bien
    var correcto = true;
    //a. El nombre debe ser requerido y tener 100 caracteres o menos.
    if (finalJSON['nombre'] == "" || finalJSON['nombre'].length > 100 ) {
        errores.push("Nombre vacío o excede los 100 caracteres.");
    }
    // b. La marca debe ser requerida y seleccionarse de una lista de opciones.
    if (finalJSON['marca'] == "") {
        errores.push("No has proporcionado ninguna marca.");
    }
    //c. El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
    if (finalJSON['modelo'] == "" || !/^[a-zA-Z0-9\s]*$/.test(finalJSON['modelo']) || finalJSON['modelo'].length > 25) {
        errores.push("Modelo vacío, no es texto alfanumérico o excede los 25 caracteres.");
    }
    //d. El precio debe ser requerido y debe ser mayor a 99.99
    if (finalJSON['precio'] == "" || !regex.test(finalJSON['precio']) || finalJSON['precio'] < 99.99) {
        errores.push("Precio no válido, debe ser mayor a 99.99");
    }
    //e. Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
    if (finalJSON['detalles'].lenght > 250) {
        errores.push("Los detalles exceden los 250 caracteres.");
    }
    //f. Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a 0.
    if (finalJSON['unidades'] == "" || parseInt(finalJSON['unidades']) < 0 || !Number.isInteger(parseInt(finalJSON['unidades']))) {
        errores.push("Unidades no válidas.");
    }
    /*g. La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
    ruta de una imagen por defecto (ver ejemplo):*/
    if (finalJSON['imagen'] == "") {
        finalJSON['imagen'].value = "img/imagen.png";
    }
    // Si hay errores, mostrarlos todos.
    if (errores.length > 0) {
        mensaje.style.display = "block";
        mensaje.innerHTML = "<h4>Errores en el formulario:</h4>" + errores.join("<br>");
       //return false;
       correcto = false;
       }
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            mensaje.style.display = "none";
            console.log(client.responseText);//MOSTRAR EN CONSOLA
            window.alert(client.responseText);//MOSTRAR CON UN ALERT
        }
    };
    if(correcto == true){
        mensaje.style.display = "none";
        client.send(productoJsonString);
    }
}


// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}