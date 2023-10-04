<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php 
if(isset($_GET['tope']))
    {
		$tope = $_GET['tope'];
    }
else
    {
        die('Parámetro "tope" no detectado...');
    }
    if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'itzel.123', 'tienda');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = $value;
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();
	}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Productos </title>
	<script>
		 function show() {

                // se obtiene el id de la fila donde está el botón presinado
                var rowId = event.target.parentNode.parentNode.id;
    
                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");

                var texto = data[7].innerHTML;

			    var texto2 = texto.replace('<img src="', '')
			    var texto3 = texto2.replace('" width="200px"', '')
			    var texto4 = texto3.replace('height="200px"', '')
			    var texto5 = texto4.replace('>', '')
			    var img = texto5.replace('>', '')
                /**
                querySelectorAll() devuelve una lista de elementos (NodeList) que 
                coinciden con el grupo de selectores CSS indicados.
                (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

                En este caso se obtienen todos los datos de la fila con el id encontrado
                y que pertenecen a la clase "row-data", se modifica a td de table.
                */

                var id = data[0].textContent.trim();
                var nombre = data[1].innerHTML;
                var marca = data[2].innerHTML;
				var modelo = data[3].innerHTML;
                var precio = data[4].innerHTML;
				var unidades = data[5].innerHTML;
                var detalles = data[6].innerHTML;
				var imagen = img.replace('http://localhost/tecnologiasweb/practicas/p07/', '');

                alert("Seras redirigido a un formulario de edición.");
                send2form(id, nombre, marca, modelo, precio, unidades, detalles, imagen);
            }
			
	</script>
</head>
<body>
	<h3>PRODUCTOS</h3>

	<?php if (isset($data)) : ?>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $_id = 0;
				foreach ($data as $key => $value) {
                    echo '<tr id=' . $_id . '>';
					echo '<th scope="value" class="row-data"> ' . $value["id"] . ' </th>';
					echo '<td class="row-data"> ' . $value["nombre"] . '</td>';
					echo '<td class="row-data"> ' . $value["marca"] . '</td>';
					echo '<td class="row-data"> ' . $value["modelo"] . '</td>';
					echo '<td class="row-data"> ' . $value["precio"] . '</td>';
					echo '<td class="row-data"> ' . $value["unidades"] . '</td>';
					echo '<td class="row-data"> ' . $value['detalles'] . '</td>';
					echo '<td class="row-data"><img src=' . $value['imagen'] . ' width="150px" height="150px" /></td>';
					echo '<td class="row-data"><input type="button" value="Editar" onclick="show()" /></td>';
                    echo '</tr ' . $_id++ . '>';
				}
				?>

			</tbody>
		</table>
	<?php endif; ?>
	<script>
		function send2form(id, nombre, marca, modelo, precio, unidades, detalles, imagen) {
                var form = document.createElement("form");

                var idIn = document.createElement("input");
                idIn.type = 'text';
                idIn.name = 'id';
                idIn.value = id;
                form.appendChild(idIn);

                var nombreIn = document.createElement("input");
                nombreIn.type = 'text';
                nombreIn.name = 'nombre';
                nombreIn.value = nombre;
                form.appendChild(nombreIn);

                var marcaIn = document.createElement("input");
                marcaIn.type = 'text';
                marcaIn.name = 'marca';
                marcaIn.value = marca;
                form.appendChild(marcaIn);

				var modeloIn = document.createElement("input");
                modeloIn.type = 'text';
                modeloIn.name = 'modelo';
                modeloIn.value = modelo;
                form.appendChild(modeloIn);

				var precioIn = document.createElement("input");
                precioIn.type = 'text';
                precioIn.name = 'precio';
                precioIn.value = precio;
                form.appendChild(precioIn);

				var unidadesIn = document.createElement("input");
                unidadesIn.type = 'text';
                unidadesIn.name = 'unidades';
                unidadesIn.value = unidades;
                form.appendChild(unidadesIn);

				var detallesIn = document.createElement("input");
                detallesIn.type = 'text';
                detallesIn.name = 'detalles';
                detallesIn.value = detalles;
                form.appendChild(detallesIn);

				var imagenIn = document.createElement("input");
                imagenIn.type = 'text';
                imagenIn.name = 'imagen';
                imagenIn.value = imagen;
                form.appendChild(imagenIn);

                console.log(form);

                form.method = 'POST';
                form.action = 'http://localhost/tecnologiasweb/practicas/p07/formulario_productos_v2.php';  

                document.body.appendChild(form);
                form.submit();
            }
	</script>
</body>

</html>