<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Respuesta </title>
</head>

<body>
    <?php
     $edad = $_POST["edad"];
     $sexo = $_POST["sexo"];

     if ($edad >= 18 && $edad<=35) {
        if ($sexo == "femenino" || $sexo == "Femenino" || $sexo == "FEMENINO") {
            echo '<div class="text-success"><h1>Bienvenida, usted está en el rango de edad permitido.</h1></div>';
        }
    } else {
        echo '<div class="text-danger"><h1>No cumple con los requisitos.</h1></div>';
    }
    ?>
</body>

</html>