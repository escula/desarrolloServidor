<?php
include_once './protectoraAnimales/crud.php';

class Animal extends Crud{
    private $id;
    private $nombre;
    private $especie;
    private $raza;
    private $genero;
    private $color;
    private $edad;
    private $conexion;
    const TABLA="animal";

    function __construct(){
        parent::__construct(self::TABLA);
        $this->conexion=parent::conection();
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
    public function crear(){
        $ps=$this->conexion->prepare("INSERT INTO (nombre, especie, raza, genero, color, edad)".self::TABLA." VALUES ( :nombre, :especie, :raza, :genero, :color, :edad)");
        $ps->bindParam(':nombre', $this->nombre);
        $ps->bindParam(':especie', $this->especie);
        $ps->bindParam(':raza', $this->raza);
        $ps->bindParam(':genero', $this->genero);
        $ps->bindParam(':color', $this->color);
        $ps->bindParam(':edad', $this->edad);
        return $ps->execute();       
    }
    
    public function actualizar(){
        $ps=$this->conexion->prepare("UPDATE ".self::TABLA." SET nombre= :nombre, especie= :especie, raza= :raza, genero= :genero, color= :color, edad= :edad WHERE id=:id");
        $ps->bindParam(':id', $this->id);
        $ps->bindParam(':nombre', $this->nombre);
        $ps->bindParam(':especie', $this->especie);
        $ps->bindParam(':raza', $this->raza);
        $ps->bindParam(':genero', $this->genero);
        $ps->bindParam(':color', $this->color);
        $ps->bindParam(':edad', $this->edad);
        return $ps->execute();
    }
}
?>