<?php
     require_once __DIR__ . '/API/Eliminar/Eliminar.php';
     use API\ELIMINAR\Eliminar as Eliminar;

    $producto = new Eliminar('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $producto->delete($_POST['id']);
    echo $producto->getResponse();
?>