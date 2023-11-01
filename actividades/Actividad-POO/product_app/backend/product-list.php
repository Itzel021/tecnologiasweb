<?php
    require_once __DIR__ . '/API/Productos.php';
    use API\PRODUCTOS\Productos as Productos;

    $productos = new Productos('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $productos->list();
    echo $productos->getResponse();

?>