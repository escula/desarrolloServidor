<?php
    class Cuenta{
        private $nombreCliente;
        private $numeroDeCuenta;
        private $tipoInteres;
        private $saldo;

        public function __construct($nombreCliente,$numeroCuenta,$tipoInteres,$saldo){
            $this->nombreCliente=$nombreCliente;
            $this->numeroDeCuenta=$numeroCuenta;
            $this->tipoInteres=$tipoInteres;
            $this->saldo=$saldo;
        }
        
        public function ingreso($cantidadAingresar){
            if($cantidadAingresar<0){
                $this->saldo=$this->saldo+$cantidadAingresar;
                return true;
            }else{
                echo "<p>no se pueden ingresar numeros negativos</p>";
                return false;
            }
        }
        public function reintegro($cantidadReintegro){
            if($cantidadReintegro<$this->saldo){
                $this->saldo=$this->saldo+$cantidadReintegro;
                return true;
            }else{
                echo "<p>no se pueden hacer un reintegro mas alto que el ingreso</p>";
                return false;
            }
        }
        
        public function transferencia(Cuenta $cuentaAtransferir,$cantidad){
            if($cuenta1==$cuenta2){
                echo 
            }else{

            }
        }
    }
?>