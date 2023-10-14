<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);

        //CONSULTAR SI EL PRODUCTO YA EXISTE
        $resultado = "SELECT * FROM productos WHERE nombre = '$jsonOBJ->nombre' and eliminado=0";
        $result = $conexion->query($resultado);//ALMACENAR LA CONSULTA
        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */
        //echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO productos VALUES (null, '$jsonOBJ->nombre', '$jsonOBJ->marca', '$jsonOBJ->modelo', $jsonOBJ->precio, '$jsonOBJ->detalles', $jsonOBJ->unidades, '$jsonOBJ->imagen', 0)";
            if (mysqli_query($conexion, $sql)) {
                echo '[SERVIDOR]: ¡EXITO! -> EL PRODUCTO ' .$jsonOBJ->nombre.' FUE INSERTADO CORRECTAMENTE.';


            } else {
                echo "ERROR: $sql. " . mysqli_error($conexion);
            }
        }else{
            echo '[SERVIDOR]: ¡ERROR! -> EL PRODUCTO ' .$jsonOBJ->nombre.' YA EXISTE EN LA BASE DE DATOS';
        }
    
    }
?>