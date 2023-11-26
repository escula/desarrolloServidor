<?php
    class Cuenta{
        private $nombreCliente;
        private $numeroDeCuenta;
        private $tipoInteres;
        private $saldo;

        public function __construct(string $nombreCliente,string $numeroCuenta,float $tipoIntere,float $saldo){
            $this->nombreCliente=$nombreCliente;
            $this->numeroDeCuenta=$numeroCuenta;
            $this->tipoInteres=$tipoIntere;
            $this->saldo=$saldo;
        }
        
        public function ingreso($cantidadAingresar){
            if($cantidadAingresar>0){
                $this->saldo=$this->saldo+$cantidadAingresar;
                return true;
            }else{
                echo "<p>no se pueden ingresar numeros negativos</p>";
                return false;
            }
        }
        public function reintegro($cantidadReintegro){
            if($cantidadReintegro<=$this->saldo){
                $this->saldo=$this->saldo-$cantidadReintegro;
                return true;
            }else{
                echo "<p>no se pueden hacer un reintegro mas alto que el ingreso</p>";
                return false;
            }
        }
        
        public function transferir(Cuenta $cuentaAtransferir,$cantidadTransferir){
            if($cantidadTransferir<=$this->saldo){
                $cuentaAtransferir->saldo=$cuentaAtransferir->saldo+$cantidadTransferir;
                $this->saldo=$this->saldo-$cantidadTransferir;
            }else{
                echo "<p>no se pueden hacer un transferir mas alto que el ingreso</p>";
            }
        }
        
        public function __set($propiedad,$valor){
            if(property_exists(__CLASS__,$propiedad)){
                $this->$propiedad=$valor;
            }else{
                return `metodo __set() No existe el atributo $propiedad`;
            }
        }
        
        public function __get($propiedad){
            if(property_exists(__CLASS__,$propiedad)){
                return $this->$propiedad;
            }else{
                return `metodo __get() No existe el atributo $propiedad`;
            }
        }
        public function __toString(){
            return "nombreCLiente".$this->nombreCliente." NumeroCuenta".$this->numeroDeCuenta." tipointeres:".$this->tipoInteres." saldo: ".$this->saldo;
        }
    }
?>