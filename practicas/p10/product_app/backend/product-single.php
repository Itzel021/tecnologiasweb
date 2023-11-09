<?php
     require_once __DIR__ . '/API/Leer/Leer.php';
     use API\LEER\Leer as Leer;
 
     $producto = new Leer('marketzone');//CREA UNA INSTANCIA DE LA CLASE
     $producto->single($_POST['id']);
     echo $producto->getResponse();

?>