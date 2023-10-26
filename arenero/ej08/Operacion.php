<?php
    class Operacion{
        protected $valor1, $valor2, $resultado;
        public function __construct(){
            $this->valor1 = 0;
            $this->valor2 = 0;
            $this->resultado = 0;
        }

        public function setValor1($val){
            $this->valor1 = $val;
        }
        public function setValor2($val){
            $this->valor2 = $val;
        }
        public function getResultados(){
            return $this->resultado;
        }
    }
    class Suma extends Operacion{
        public function operar(){
            $this->resultado = $this->valor1 + $this->valor2;
        }

    }
    class Resta extends Operacion{
        public function operar(){
            $this->resultado = $this->valor1 - $this->valor2;
        }

    }
?>