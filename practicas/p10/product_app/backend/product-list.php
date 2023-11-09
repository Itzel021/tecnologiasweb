<?php
    require_once __DIR__ . '/API/Leer/Leer.php';
    use API\LEER\Leer as Leer;

    $productos = new Leer('marketzone');//CREA UNA INSTANCIA DE LA CLASE
    $productos->list();
    echo $productos->getResponse();

?>