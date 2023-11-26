<?php
    include 'Persona.php';
    class Alumno extends Persona{//ALumno puede usar todos los metodos de POersona, también se puede sobreescribir
        private $dinero;
        private static $dineroConjunto=409;
        function __construct($alumno,$apellido,$nombre){ #__toString, __delete, estas funciones que empiezan por __ no se llaman directamente
            parent::__construct($nombre,$apellido);
            $this->nombre=$alumno;
            $this->apellido=$apellido;
            $this->dinero=self::$dineroConjunto++;
            
        }
        function datosAlumno(){
            $contendio=$this->nombre.' '.$this->apellido.'ID= '.self::$dineroConjunto;
            return $contendio;
        }

        function __toString():string{
            return $this->clase.' '.$this->apellido.' '.$this->dinero;
        }
        function __get($propiedad){
            if(property_exists($this,$propiedad)){
                return $this->$propiedad;
            }
            
        }
        function __set($nombre,$valor){
            if(property_exists($this,$nombre)){
                $this->$nombre = $valor;
            }
        }

    }
    

?>