<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Práctica 4 </title>
</head>

<body>
    <h1>Práctica 4: Uso de funciones, ciclos y arreglos en PHP</h1>
    <h2>Ejercicio 1</h3>
        <p>1. Escribir un programa para comprobar si un número es un múltiplo de 5 y 7.</p>
        <?php
    if(isset($_GET['numero']))
    {
        $num = $_GET['numero'];
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' <mark>SÍ</mark> es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' <mark>NO</mark> es múltiplo de 5 y 7.</h3>';
        }
    }
    ?>
    
</body>

</html>