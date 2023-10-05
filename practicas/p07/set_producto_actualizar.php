<?php
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];
$eliminado = 0;

    /* MySQL Conexion*/
    $link = mysqli_connect("localhost", "root", "itzel.123", "tienda");
    // Chequea coneccion
    if($link === false){
    die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }
    // Ejecuta la actualizacion del registro
    $sql = "UPDATE productos SET nombre= '{$nombre}', marca='{$marca}', modelo='{$modelo}', precio={$precio}, detalles='{$detalles}', unidades={$unidades}, imagen='{$imagen}' WHERE id={$id}";
    if(mysqli_query($link, $sql)){
    echo '<div>';
        echo '<h2>¡PRODUCTO ACTUALIZADO EXITOSAMENTE!</h2>'; 
        
        echo '<p>Espera mientras se te redirige a la página principal...</p>';
        echo '</div>';
        header("refresh:5; url=http://localhost/tecnologiasweb/practicas/p07/get_productos_xhtml_v2.php?tope=100");
        exit;
    } else {
    echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
    }
    // Cierra la conexion
    mysqli_close($link);
?>