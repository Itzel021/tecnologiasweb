<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Respuesta</title>
</head>

<body>
    <h2> Ejercicio 6 </h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de <br>
        una ciudad. Cada vehículo debe ser identificado por:</p>
    <ul>
        <li>Matricula</li>
        <ul>
            <li>Marca</li>
            <li>Modelo (año)</li>
            <li>Tipo (sedan|hachback|camioneta)</li>
        </ul>
        <li>Auto</li>
        <ul>
            <li>Nombre</li>
            <li>Ciudad</li>
            <li>Dirección</li>
        </ul>
    </ul>
    <?php
    $autos = array(
        'UBN6338' => array(
            'Auto' => array(
                'marca' => 'HONDA',
                'modelo' => '2020',
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Alfonzo Esparza',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'C.U., Jardines de San Manuel'
            )
        ),
        'UBN6339' => array(
            'Auto' => array(
                'marca' => 'MAZDA',
                'modelo' => '2019',
                'tipo' => 'sedan'
            ),
            'Propietario' => array(
                'nombre' => 'Ma. del Consuelo Molina',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '97 oriente'
            )
        ),
        'TOY2355' => array(
            'Auto' => array(
                'marca'=> 'TOYOTA',
                'modelo' => '2014',
                'tipo' => 'sedan',
            ),
            'Propietario' => array(
                'nombre' => 'Evelyn Flores Lechuga',
                'ciudad' => 'Puebla, Pue',
                'direccion' => 'C 5 Santiago'
            )
        ),
        'FRD1121' => array(
            'Auto' => array(
                'marca'=> 'FORD',
                'modelo' => '2020',
                'tipo' => 'coupe',
            ),
            'Propietario' => array(
                'nombre' => 'Miguel Martínez Carrera',
                'ciudad' => 'Tehuacán, Pue',
                'direccion' => 'C 4 Sur'
            )
        ),
        'CHV8392' => array(
            'Auto' => array(
                'marca'=> 'CHEVROLET',
                'modelo' => '1987',
                'tipo' => 'camioneta',
            ),
            'Propietario' => array(
                'nombre' => 'Delfino Agustín',
                'ciudad' => 'Tehuacán, Pue',
                'direccion' => 'Av San Hipolito'
            )
            ),
        'NIS4343' => array(
            'Auto' => array(
                'marca'=> 'NISSAN',
                'modelo' => '2015',
                'tipo' => 'suv',
            ),
            'Propietario' => array(
                'nombre' => 'Enrique Morales',
                'ciudad' => 'Puebla, Pue',
                'direccion' => 'Av principal'
            )
            ),
        'HYN6344' => array(
            'Auto' => array(
                'marca'=> 'HYUNDAI',
                'modelo' => '2011',
                'tipo' => 'suv',
            ),
            'Propietario' => array(
                'nombre' => 'Luis Navarro Diaz',
                'ciudad' => 'Oaxaca, Oax',
                'direccion' => 'C 23 norte'
            )
            ),
        'KIA3325' => array(
            'Auto' => array(
                'marca'=> 'KIA',
                'modelo' => '2020',
                'tipo' => 'suv',
            ),
            'Propietario' => array(
                'nombre' => 'Fernando Garza',
                'ciudad' => 'Puebla, Pue',
                'direccion' => 'C 14 sur'
            )
            ),
        'CHV8390' => array(
            'Auto' => array(
                'marca'=> 'CHEVROLET',
                'modelo' => '2010',
                'tipo' => 'camioneta',
            ),
            'Propietario' => array(
                'nombre' => 'Itzel Martínez Carrera',
                'ciudad' => 'Puebla, Pue',
                'direccion' => 'Col. Universidades, Prol. de la 14 sur'
            )
            ),
        'FRD1128' => array(
            'Auto' => array(
                'marca'=> 'FORD',
                'modelo' => '2020',
                'tipo' => 'coupe',
            ),
            'Propietario' => array(
                'nombre' => 'Maria Hernandez',
                'ciudad' => 'Oaxaca, Oax',
                'direccion' => 'C 2 poniente'
            )
            ),
        'HYN6388' => array(
            'Auto' => array(
                'marca'=> 'HYUNDAI',
                'modelo' => '2016',
                'tipo' => 'suv',
            ),
            'Propietario' => array(
                'nombre' => 'Yoalli Mendéz',
                'ciudad' => 'Oaxaca, Oax',
                'direccion' => 'Av principal 34'
            )
            ),
        'TOY2300' => array(
            'Auto' => array(
                'marca'=> 'TOYOTA',
                'modelo' => '2021',
                'tipo' => 'sedan',
            ),
            'Propietario' => array(
                'nombre' => 'Mellisa Valladares',
                'ciudad' => 'Atlixco, Pue',
                'direccion' => 'Av Santiago 22'
            )
            ),
        'NIS3029' => array(
            'Auto' => array(
                'marca'=> 'NISSAN',
                'modelo' => '2013',
                'tipo' => 'suv',
            ),
            'Propietario' => array(
                'nombre' => 'Ricardo Morales',
                'ciudad' => 'Tehuacán, Pue',
                'direccion' => '24 norte'
            )
            ),
        'TES1111' => array(
            'Auto' => array(
                'marca'=> 'TESLA',
                'modelo' => '2021',
                'tipo' => 'eléctrico',
            ),
            'Propietario' => array(
                'nombre' => 'Arleth Lezama',
                'ciudad' => 'Monterrey',
                'direccion' => 'C 5 sur'
            )
            ),
        'TES1141' => array(
            'Auto' => array(
                'marca'=> 'TESLA',
                'modelo' => '2023',
                'tipo' => 'eléctrico',
            ),
            'Propietario' => array(
                'nombre' => 'Monica Gonzales',
                'ciudad' => 'Monterrey',
                'direccion' => ' Av Margaritas'
            )
        )
    );    
    
    $matricula = $_POST['matricula'];
        if ($matricula == 'TODOS') {
            echo "<h2>Información de Todos los Autos Registrados</h2>";
            echo "<pre>";
            print_r($autos);
            echo "</pre>";
        } 
        else {
            $autoInfo = $autos[$matricula];
            echo "<h2>Información del Auto con Matrícula: $matricula</h2>";
            echo "<pre>";
            print_r($autoInfo);
            echo "</pre>";
        }
    
    ?>
</body>

</html>