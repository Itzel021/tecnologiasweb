<?php
function multiplo(){
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
}
function impar_par_impar(){
    $matriz = array(); 
        $iteraciones = 0;
        do {
            $numeros = array(); 
            $numeros[] = rand(1, 100); 
            $numeros[] = rand(1, 100); 
            $numeros[] = rand(1, 100); 
            $iteraciones++;
            print_r($numeros);
            echo '<br>';
            if ($numeros[0] % 2 != 0 && $numeros[1] % 2 == 0 && $numeros[2] % 2 != 0) {
                $matriz[] = $numeros; 
            }
        } while (count($matriz) == 0);
        
        echo "Condición cumplida con la fila: <br>";
        foreach ($matriz as $fila) {
            echo implode(", ", $fila) . "<br>";
        }
        echo $iteraciones * 3 . " números obtenidos en " . $iteraciones . " iteraciones";
}
?>