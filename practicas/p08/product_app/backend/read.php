<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['bsq']) ) {
        $busqueda = $_POST['bsq'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $query = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR detalles LIKE '%$busqueda%'";

         // Consulta SQL que busca productos por ID, nombre o marca
        if ( $result = $conexion->query($query) ) {
            // SE OBTIENEN LOS RESULTADOS
			//$row = $result->fetch_array(MYSQLI_ASSOC);

            $row = $result->fetch_all(MYSQLI_ASSOC);
            /*Esta línea obtiene todas las filas de resultados en un solo paso y las almacena en un arreglo. */

            if(!is_null($row)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($row as $numero => $registro) {//recorre cada fila de resultados obtenidos
                    foreach($registro as $key => $value){//recorre cada columna (campo) en la fila de resultados
                        $data[$numero][$key] = utf8_encode($value);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>