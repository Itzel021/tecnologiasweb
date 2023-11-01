<?php
     require_once __DIR__. '/API/Productos.php';
     use API\PRODUCTOS\Productos as Productos;
 
     $producto = new Productos('marketzone');//CREA UNA INSTANCIA DE LA CLASE
     $producto->single($_POST['id']);
     echo $producto->getResponse();

?>