<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Práctica 3 </title>
</head>

<body>
    <h2>Ejercicio 1</h2>
    <p>1. Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
    <?php
    //Código PHP
    $_myvar; 
    $_7var;
    // myvar; Invalida porque no comienza con el signo de dólar ($).
    $myvar; 
    $var7;
    $_element1; 
    //$house*5; Invalida porque realiza una operación (*5).
    echo '<ul>';
    echo '<li>$_myvar es válida porque inicia con $ y guion bajo.</li>';
    echo '<li>$_7var es válida porque inicia con $ y guion bajo.</li>';
    echo '<li>$myvar es válida porque inicia con $ y una letra.</li>';
    echo '<li>$var7 es válida porque inicia con $ y una letra.</li>';
    echo '<li>$_elemnt1 es válida porque inicia $ y con guion bajo.</li>';
    echo '</ul>';
    ?>
    <div style="width: 60%; text-align: justify">
    <h2>Ejercicio 2</h2>
    <p>2. Proporcionar los valores de $a, $b, $c como sigue:</p>
    <p>$a = “ManejadorSQL”;</p>
    <p>$b = 'MySQL';</p>
    <p> $c = &$a;</p>
    <?php
    //Código PHP
    $a = "PHP server";
    $b = &$a;
    $c = &$a;
    echo '<p>a. Ahora muestra el contenido de cada variable</p>';
    echo "\$a = $a";
    echo '<br>';
    echo "\$b = $b";
    echo '<br>';
    echo "\$c = $c";
    ?>
    <p>b. Agrega al código actual las siguientes asignaciones:</p>
    <p>$a = “PHP server”;</p>
    <p>$b = &$a;</p>
    <?php
      //Código PHP
    echo '<p>c. Vuelve a mostrar el contenido de cada uno:</p>';
    echo "\$a = $a";
    echo '<br>';
    echo "\$b = $b";
    echo '<br>';
    echo "\$c = $c";
    ?>
    <p>d. Describe y muestra en la página obtenida qué ocurrió en el segundo bloque de
        asignaciones</p>
        <strong>RESPUESTA. </strong>
            Al modificar los valores de las variables $a y $b, los cambios afectan
            a los valores originales y a las variables que hacen referencia e él,
            porque no se realiza una copia de los valores. 
            Es decir, que la variable contendra el último valor asignado, es por ello
            que al mostrar el contenido todo dice "PHP server".
        
    </div>
    
    <!--e. Utiliza la función correspondiente de PHP para liberar las variables utilizadas al final
    de cada ejercicio, de lo contrario habrá conflictos.-->
    <?php
    unset($a,$b,$c);
    ?>
    <div style="width: 60%; text-align: justify">
    <h2>Ejercicio 3</h2>
    <p>3. Muestra el contenido de cada variable inmediatamente después de cada asignación, <br>
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):</p>
    <p>$a = “PHP5”; $z[] = &$a; $b = “5a version de PHP”;</p>
    <p>$c = $b*10; $a .= $b; $b *= $c; $z[0] = “MySQL”;</p>
    <?php
    //Código PHP
    $a = "PHP5";
    echo "Contenido de \$a después de la primera asignación: $a<br>";

    $z[] = &$a;
    echo "Contenido de \$z después de la asignación de referencia: ";
    print_r($z);
    echo "<br>";

    $b = "5a versión de PHP";
    echo "Contenido de \$b después de la segunda asignación: $b<br>";

    @$c = $b * 10;
    echo "Contenido de \$c después de la tercera asignación: $c<br>";

    @$a .= $b;
    echo "Contenido de \$a después de la concatenación: $a<br>";

    @$b *= $c;
    echo "Contenido de \$b después de la multiplicación: $b<br>";

    $z[0] = "MySQL";
    echo "Contenido de \$z después de la última asignación: ";
    print_r($z);
    echo "<br>";
    ?>
    </div>
    
    <h2>Ejercicio 4</h2>
    <p>4. Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de <br>
        la matriz $GLOBALS o del modificador global de PHP.</p>
    <?php
    //Código PHP
    $GLOBALS['a'];
    echo "\$a tiene el valor de: $a";
    echo "<br>";
    $GLOBALS['b'];
    echo "\$b tiene el valor de: $b";
    echo "<br>";
    $GLOBALS['c'];
    echo "\$c tiene el valor de: $c";
    echo "<br>";
    $GLOBALS['z'];
    echo "\$z tiene el valor de: ";
    print_r($z);
    ?>
    <!--e. Utiliza la función correspondiente de PHP para liberar las variables utilizadas al final
    de cada ejercicio, de lo contrario habrá conflictos.-->
    <?php
    unset($a,$b,$c,$z);
    ?>
    <h2>Ejercicio 5</h2>
    <p>5. Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = “7 personas”; $b = (integer) $a; $a = “9E3”; $c = (double) $a;</p>
    <?php
    $a = '7 personas';
    $b = (integer) $a;
    $a = '9E3';
    $c = (double) $a;
    
    echo "\$a: $a";
    echo "<br>";
    echo "\$b: $b"; 
    echo "<br>";
    echo "\$c: $c"; 
    ?>
    <h2>Ejercicio 6</h2>
    <p>6. Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas <br>
        usando la función var_dump(datos).</p>
    <p>
        $a = '0'; $b = 'TRUE'; $c = FALSE; $d = ($a OR $b); $e = ($a AND $c); $f = ($a XOR $b);
    </p>
    <?php
    $a = '0';
    $b = 'TRUE';
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);
    echo '<ul>';
    echo '<li>$a tiene el valor de: ';
    echo var_dump($a);
    echo '</li>';
    echo '<li>$b tiene el valor de: ';
    echo var_dump($b);
    echo '</li>';
    echo '<li>$c tiene el valor de: ';
    echo var_dump($c);
    echo '</li>';
    echo '<li>$d tiene el valor de: ';
    echo var_dump($d);
    echo '</li>';
    echo '<li>$e tiene el valor de: ';
    echo var_dump($e);
    echo '</li>';
    echo '<li>$f tiene el valor de: ';
    echo var_dump($f);
    echo '</li>';
    echo '</ul>';
    ?>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e <br>
        en uno que se pueda mostrar con un echo:</p>
    <?php
    $c_bool = boolval($c);
    $e_bool = boolval($e);
    
    $c_string = var_export($c_bool, true);
    $e_string = var_export($e_bool, true);
    
    echo '<strong>RESPUESTA.</strong>Función boolval() para obtener el valor booleano de la variable. <br>
        Después usar var_export() para convertir el valor booleano a una cadena.<br>
        Finalmente mostrarlo con echo.<br>';
    echo "\$c = $c_string";
    echo "<br>";
    echo "\$e = $e_string";
    ?>

    <h2>Ejercicio 7</h2>
    <p>7. Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
    <?php
    echo 'a. La versión de Apache y PHP<br>';
    $apache_version = $_SERVER['SERVER_SOFTWARE'];
    $php_version = phpversion();
    echo "<strong>Versión de Apache:</strong> $apache_version<br>";
    echo "<strong>Versión de PHP:</strong> $php_version<br>";

    $server_os = $_SERVER['SERVER_NAME'];
    echo "b. El nombre del sistema operativo (servidor):<strong> $server_os</strong><br>";
    
    $client_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    echo "c. El idioma del navegador (cliente): <strong>$client_language</strong><br>";
    ?>
</body>

</html>