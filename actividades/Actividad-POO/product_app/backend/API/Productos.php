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
    //FUNCION PARA BUSCAR PRODUCTOS
    public function search($search){
        // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($search) ){
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
        if ( $result = $this->conexion->query($sql) ) {
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
    //FUNCION PARA AGREGAR PRODUCTOS
    public function add($producto){
        $this->response = array(
            'status'  => 'Error',
            'message' => 'Ya existe un producto con ese nombre'
        );
        if(!empty($producto)) {
            // SE TRANSFORMA EL STRING DEL JASON A OBJETO
            $jsonOBJ = json_decode($producto);
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            if ($result->num_rows == 0) {
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                if($this->conexion->query($sql)){
                    $this->response['status'] =  "Success";
                    $this->response['message'] =  "Producto agregado";
                } else {
                    $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
    
            $result->free();
            // Cierra la conexion
            $this->conexion->close();
        }
    }
    //FUNCION PARA ELIMINAR PRODUCTO
    public function delete($id){
        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->response = array(
        'status'  => 'error',
        'message' => 'La consulta falló'
    );
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
        if ( $this->conexion->query($sql) ) {
            $this->response['status'] =  "success";
            $this->response['message'] =  "Producto eliminado";
		} else {
            $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
        }
		$this->conexion->close();
    } 
    }
    //FUNCION PARA EDITAR PRODUCTO
    public function edit($producto){
        $this->response = array(
            'status'  => 'error',
            'message' => 'No es posible actualizar'
        );
        
        if (isset($producto)) {
        
            $jsonOBJ = json_decode($producto);
            $sql_1 = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' and marca = '{$jsonOBJ->marca}' and modelo = '{$jsonOBJ->modelo}' and precio = {$jsonOBJ->precio} and detalles = '{$jsonOBJ->detalles}' and unidades = {$jsonOBJ->unidades} and imagen = '{$jsonOBJ->imagen}'";
        
            $res = $this->conexion->query($sql_1);
        
            if ($res->num_rows == 0) {
                // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = '{$jsonOBJ->id}'";
                $result = $this->conexion->query($sql);
        
                $this->conexion->set_charset("utf8");
                if ($this->conexion->query($sql)) {
                    $this->response['status'] =  "success";
                    $this->response['message'] =  "Producto actualizado";
                } else {
                    $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            } else {
                $this->response['status'] =  "success";
                $this->response['message'] =  "No es una actualizacion si son los mismos datos";
            }
            //$result->free();
            // Cierra la conexion
            $this->conexion->close();
        }
    }    
    //FUNCION SINGLE
    public function single($id){
        if (isset($id)) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            if ($result = $this->conexion->query("SELECT * FROM productos WHERE id = {$id}")) {
                // SE OBTIENEN LOS RESULTADOS
                $row = $result->fetch_assoc();

                if (!is_null($row)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach ($row as $key => $value) {
                        $this->response[$key] = ($value);
                    }
                }
                $result->free();
            } else {
                die('Query Error: ' . mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }
    //FUNCION SEARCH NAME
    public function searchName($name){
        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->response = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($name) ) {
        $search = $_GET[$name];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "SELECT * FROM productos WHERE (nombre LIKE '{$search}%')";
        if ( $result = $this->conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->response[$num][$key] = ($value);
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
}
?>