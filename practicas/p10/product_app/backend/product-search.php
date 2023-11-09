<?php
    require_once __DIR__ . '/API/Leer/Leer.php';
    use API\LEER\Leer as Leer;
    
    $buscando = new Leer('marketzone');//SE CREA UNA INSTANCIA DE LA CLASE
    $buscando->search($_GET['search']);
    echo $buscando->getResponse();
?>