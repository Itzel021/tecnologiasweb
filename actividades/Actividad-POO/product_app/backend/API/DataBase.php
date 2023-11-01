<?php 
namespace API\DATABASE;
abstract class DataBase {
    protected $conexion, $host, $username, $pass, $database;

    public function __construct($database){
        $this->host = "localhost";
        $this->username = "root";
        $this->pass = "itzel.123";
        //$this->database = 'marketzone';
        //CREAMOS LA CONEXIÓN A LA DB
        $this->conexion = @mysqli_connect($this->host, $this->username, $this->pass, $database);
        if(!$this->conexion){
            die('Error al conectar la base de datos');
        }
    }
    
}
?>
