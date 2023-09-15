<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Práctica 4 </title>
</head>
<style>
.sangria {
    margin-left: 120px;
}

.par {
    color: tomato;
}

.impar {
    color: DodgerBlue;
}
</style>

<body>
    <?php
    include("p03_funciones.php");
    ?>
    <h1>Práctica 4: Uso de funciones, ciclos y arreglos en PHP</h1>
    <h2>Ejercicio 1</h3>
        <p>1. Escribir un programa para comprobar si un número es un múltiplo de 5 y 7.</p>
        <?php
        multiplo();
        ?>
    <h2>Ejercicio 2</h2>
        <p>2. Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
            secuencia<br> compuesta <b class="impar">impar</b>, <b class="par">par</b>, <b class="impar">impar</b></p>
        <p>Por ejemplo:</p>
        <p class="sangria">990, 382, 786</p>
        <p class="sangria">422, 361, 473</p>
        <p class="sangria">392, 671, 914</p>
        <p class="sangria"><b class="impar">213</b>, <b class="par">744</b>, <b class="impar">911</b></p>
        <p>Estos números deben almacenarse en una matriz de Mx3, donde M es el número de filas y <br>
            3 el número de columnas. Al final muestra el número de iteraciones y la cantidad de <br>
            números generados:</p>

        <p class="sangria">12 números obtenidos en 4 iteraciones</p>
        <?php
        impar_par_impar();
        ?>
        <h2>Ejercicio 3</h2>
        <p>3. Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
            pero que además sea múltiplo de un número dado.</p>
        <ul>
            <li>Crear una variante de este script utilizando el ciclo do-while.</li>
            <li>El número dado se debe obtener vía GET.</li>
        </ul>
        <?php
        $resultado = multiplo_entero();
        echo $resultado;
        ?>
</body>

</html>