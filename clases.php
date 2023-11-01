<?php
    class Alumno{
        private $clase;
        public $apellido;
        public const dineroConjunto=0;
        function __construct(){ #__toString, __delete, estas funciones que empiezan por __ no se llaman directamente
            $this->clase="p";
            $this->apellido="a";
            
        }
        function datosAlumno(){
            return $this->clase.' '.$this->apellido.' '.self::dineroConjunto;
        }
        function getClase(){
            return $this->clase;
        }
        function setClase($clase){
            $this->clase=$clase;
        }
        function __toString():string{
            return $this->clase.'
             '.$this->apellido.' '.self::dineroConjunto;
        }
        function __get($propiedad){
            return $propiedad;
        }

    }
    $alumno =new Alumno();
    echo $alumno->datosAlumno();
    echo Alumno::dineroConjunto;
    #EL encapsulamiento se pierde con los getter y setter mágicos
    echo $alumno->apellido;
?>
