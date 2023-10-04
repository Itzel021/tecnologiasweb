<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Práctica 7</title>
</head>
<style>
    #contenedor {
        width: 40%;
    }
    input, textarea, select {
        width: 50%;
    }
</style>

<body>
    <div id="contenedor" class="container-fluid p-3">
        <h1>Formulario Productos</h1>
        <p>Actualiza la información de tu producto:</p>
        <form method="post" id="form_productos">
            <label for="id">ID (solo lectura):</label><br>
            <input type="text" name="id" readonly
             value="<?= !empty($_POST['id'])?$_POST['id']:$_GET['id'] ?>"><br>
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" maxlength="100"
             value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"><br>
            <label for="marca">Marca:</label><br>
            <select name="marca" form="form_productos">
                <option value="<?= !empty($_POST['marca']) ? $_POST['marca'] : '---' ?>">---</option>
                <option value="Apple">Apple</option>
                <option value="Samsung">Samsung</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="Sony">Sony</option>
                <option value="Huawei">Huawei</option>
                <option value="LG">LG</option>
                <option value="Oppo">Oppo</option>
                <option value="Motorola">Motorola</option>
                <option value="Nokia">Nokia</option>
                <option value="Redmi">Redmi</option>
            </select><br>
            <label for="modelo">Modelo:</label><br>
            <input type="text" name="modelo" maxlength="25"
            value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"><br>
            <label for="precio">Precio:</label><br>
            <input type="text" name="precio" placeholder="00.00"
            value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"><br>
            <label for="detalles">Detalles:</label><br>
            <textarea rows="3" name="detalles" maxlength="250" placeholder="No más a 250 caracteres.">
                <?php echo !empty($_POST['detalles']) ? $_POST['detalles'] : $_GET['detalles']; ?>
            </textarea><br>
            <label for="unidades">Unidades:</label><br>
            <input type="text" name="unidades"
            value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"><br>
            <label for="img">Imagen:</label><br>
            <input type="text" name="imagen" placeholder="img/imagen.png"
            value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>">
            <br><br>
            <button type="button" onclick="return validarDatos();">Enviar</button>
            <div id="mensaje" style="display: none;"  class="w3-panel w3-pale-red w3-border"></div>
        </form>
    </div>

    <script>
        //Validación con JavaScript
        function validarDatos() {

            var nombre = document.forms['form_productos']['nombre'].value.trim();
            var marca = document.forms['form_productos']['marca'].value.trim();
            var modelo = document.forms['form_productos']['modelo'].value.trim();
            var precio = document.forms['form_productos']['precio'].value.trim();
            var detalles = document.forms['form_productos']['detalles'].value.trim();
            var unidades = document.forms['form_productos']['unidades'].value.trim();
            var imagen = document.forms['form_productos']['imagen'].value.trim();

            //Mostrar los errores
            var mensaje = document.getElementById('mensaje');
            // Expresión regular para validar números enteros o decimales
            var regex = /^[0-9]+(\.[0-9]+)?$/;
            //Crear un arreglo de todos los errores
            var errores = [];

            //a. El nombre debe ser requerido y tener 100 caracteres o menos.
            if (nombre == "" || nombre.length > 100 || !/^[a-zA-Z\s]*$/.test(nombre) ) {
                errores.push("Nombre vacío o excede los 100 caracteres.");
            }
            // b. La marca debe ser requerida y seleccionarse de una lista de opciones.
            if (marca == "none") {
                errores.push("No has seleccionado ninguna marca.");
            }
            //c. El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
            if (modelo == "" || !/^[a-zA-Z0-9\s]*$/.test(modelo) || modelo.length > 25) {
                errores.push("Modelo vacío, no es texto alfanumérico o excede los 25 caracteres.");
            }
            //d. El precio debe ser requerido y debe ser mayor a 99.99
            if (precio == "" || !regex.test(precio) || precio < 99.99) {
                errores.push("Precio no válido, debe ser mayor a 99.99");
            }
            //e. Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
            if (detalles.lenght > 250) {
                errores.push("Los detalles exceden los 250 caracteres.");
            }
            //f. Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a 0.
            if (unidades == "" || parseInt(unidades) < 0 || !Number.isInteger(parseInt(unidades))) {
                errores.push("Unidades no válidas.");
            }
            /*g. La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
            ruta de una imagen por defecto (ver ejemplo):*/
            if (imagen == "") {
                document.forms['form_productos']['imagen'].value = "img/imagen.png";
            }
            // Si hay errores, mostrarlos todos.
             if (errores.length > 0) {
             mensaje.style.display = "block";
             mensaje.innerHTML = "Errores en el formulario:<br>" + errores.join("<br>");
            return false;
            }
            //Todos los campos son válidos.
            return true;
        }
    </script>
</body>

</html>