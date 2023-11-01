<?php 
namespace API\PRODUCTOS;
require_once __DIR__ . '/DataBase.php';
use API\DATABASE\DataBase as DataBase;

class Productos extends DataBase{
    private $response;
    public function __construct($database){
        $this->response = array();
        parent::__construct($database);//HEREDAMOS EL CONSTRUCTOR DE LA SUPER CLASE
    }
    //FUNCION PARA DEVOLVER EN FORMATO JSON
    public function getResponse(){
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }

    //FUNCION PARA LISTAR LOS PRODUCTOS
    public function list(){
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);
    
            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }
    
}
?>