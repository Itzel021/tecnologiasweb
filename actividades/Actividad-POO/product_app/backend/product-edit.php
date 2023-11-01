<?php
    require_once __DIR__. '/API/Productos.php';
    use API\PRODUCTOS\Productos as Productos;

    $producto = file_get_contents('php://input');
    $editar = new Productos('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $editar->edit($producto);
    echo $editar->getResponse();
    
    
?>