<?php
include_once 'readingMaterial.php';
    
class Magazine extends RedigingMaterial{
        private $additionalResources;
        function __construct($adicionales)
        {
            parent::__construct();
            $this->additionalResources=$adicionales;
        }

        /**
         * Get the value of additionalResources
         */ 
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
    }



?>