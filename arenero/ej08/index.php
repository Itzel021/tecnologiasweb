<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Operacion.php';
    
        $sum1 = new Suma; //Se inicializa valor1 y valor2 con 0
        $sum1->setValor1(10);//Usa el metodo de superclase 
        $sum1->setValor2(5);//Usa el metodo de superclase
        $sum1->operar();//Se usa metodo propio
        echo "La suma de 10 y 5 es: ". $sum1->getResultados().'<br>';//Se vuelve usar metodo de superclase

        $res1 = new Resta; //Se inicializa valor1 y valor2 con 0
        $res1->setValor1(50);//Usa el metodo de superclase 
        $res1->setValor2(15);//Usa el metodo de superclase
        $res1->operar();//Se usa metodo propio
        echo "La resta de 50 y 15 es: ". $res1->getResultados();//Se vuelve usar metodo de superclase
    ?>
</body>
</html>