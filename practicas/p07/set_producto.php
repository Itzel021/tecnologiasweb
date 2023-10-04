<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];
$eliminado = 0;

// Verificar si el campo de imagen está vacío
if (empty($imagen)) {
    $imagen = 'img/imagen.png'; // Establecer el valor predeterminado
}

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'itzel.123', 'tienda');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

/** Crear una tabla que no devuelve un conjunto de resultados */
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}',{$eliminado})";
if ( $link->query($sql) ) 
{
    echo 'ID: '.$link->insert_id.' Producto insertado correctamente';
}
else
{
	echo 'El Producto no pudo ser insertado.';
}

$link->close();
?>