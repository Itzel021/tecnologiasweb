<?php
    require_once __DIR__ . '/API/Productos.php';
    use API\PRODUCTOS\Productos as Productos;
    
    $buscando = new Productos('marketzone');//SE CREA UNA INSTANCIA DE LA CLASE
    $buscando->search($_GET['search']);
    echo $buscando->getResponse();
?>