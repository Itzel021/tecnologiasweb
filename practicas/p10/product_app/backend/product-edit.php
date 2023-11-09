<?php
    require_once __DIR__ . '/API/Actualizar/Actualizar.php';
    use API\ACTUALIZAR\Actualizar as Actualizar;

    $producto = file_get_contents('php://input');
    $editar = new Actualizar('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $editar->edit($producto);
    echo $editar->getResponse();
    
    
?>