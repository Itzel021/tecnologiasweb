<?php
    require_once __DIR__. '/API/Productos.php';
    use API\PRODUCTOS\Productos as Productos;

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $agregar = new Productos('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $agregar->add($producto);
    echo $agregar->getResponse();

?>