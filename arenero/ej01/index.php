<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Llama solo una vez el archivo
        require_once __DIR__.'/Persona.php'; //Concatena la ruta completa con la parcial

        $per1 = new Persona;
        $per1->inicializar('Itzel');
        $per1->mostrar();

        $per2 = new Persona;
        $per2->inicializar('Daniela');
        $per2->mostrar();
    
    ?>
</body>
</html>