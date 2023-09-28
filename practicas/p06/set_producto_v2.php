<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Registro completo </title>
    <style type="text/css">
			h2 {color: #005825;
			border-bottom: 1px solid #005825;}
			p {font-size: 1.2em;
			color: red;}
		</style>
</head>

<body>
<?php
$nombre = $_POST["nombre"];
$marca  = $_POST["marca"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$detalles = $_POST["detalles"];
$unidades = $_POST["unidades"];
$imagen   = $_POST["imagen"];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'itzel.123', 'marketzone');

/** comprobar la conexión */
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error . '<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
// Validación de campos
if (empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || empty($detalles) || empty($unidades) || empty($imagen)) {
    echo '<p>Tienes campos vacíos.</p>';
} elseif ($precio < 0){
    echo '<p>El precio no es válido. Ejemplo de formato correcto: 0.00</p>';
}elseif(!preg_match('/^\d+$/', $unidades)){
    echo '<p>Unidades no válidas. Deben ser números enteros.</p>';
}elseif(!preg_match('/^img\/[a-zA-Z0-9\/]+\.(jpg|png)$/', $imagen)){
    echo '<p>Formato de imagen incorrecto, el formato debe comenzar con <b>img/</b>.<br> Ejemplo de formato correcto: img/imagen.png</p>';
}else {
    /** Crear una tabla que no devuelve un conjunto de resultados */
$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
if ( $link->query($sql) ) 
{
        echo '<div>';
        echo '<h2>¡PRODUCTO INSERTADO EXITOSAMENTE!</h2>'; 
        echo '<br><b>ID: </b>'.$link->insert_id;      
        echo '<br><b>NOMBRE: </b>' . $nombre;
        echo '<br><b>MARCA: </b>' . $marca;
        echo '<br><b>MODELO: </b>' . $modelo;
        echo '<br><b>PRECIO: </b>' . $precio;
        echo '<br><b>DETALLES: </b>' . $detalles;
        echo '<br><b>UNIDADES: </b>' . $unidades;
        echo '<br><b>IMAGEN: </b><br> <img src=http://localhost/tecnologiasweb/practicas/p06/' . $imagen . 'width="200px" height="200px"/>';
        echo '</div>';
}
else
{
	echo '<h4>¡NO SE PUDO INSERTAR EL PRODUCTO!</h4> ';
}
}

$link->close();

?>
    <p>
        <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml11"
                alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
</body>

</html>