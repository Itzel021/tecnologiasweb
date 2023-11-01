<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        'itzel.123',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conectada!');
    }
?>