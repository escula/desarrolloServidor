<?php
include_once './protectoraAnimales/crud.php';
class Usuario extends Crud{
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $edad;
    private $conexion;
    const TABLA="usuarios";
    public function __contructor(){
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
        $ps=$this->conexion->prepare("INSERT INTO (nombre, apellido, sexo, direccion, telefono)".self::TABLA." VALUES ( :nombre, :apellido, :sexo, :direccion, :telefono)");
        $ps->bindParam(':id', $this->id);
        $ps->bindParam(':nombre', $this->nombre);
        $ps->bindParam(':apellido', $this->apellido);
        $ps->bindParam(':sexo', $this->sexo);
        $ps->bindParam(':direccion', $this->direccion);
        $ps->bindParam(':telefono', $this->telefono);
        $ps->bindParam(':edad', $this->edad);
        return $ps->execute();       
    }
    
    public function actualizar(){
        $ps=$this->conexion->prepare("UPDATE ".self::TABLA." SET nombre= :nombre, apellido= :apellido, sexo= :sexo, direccion= :direccion, telefono= :telefono WHERE id=:id");
        $ps->bindParam(':id', $this->id);
        $ps->bindParam(':nombre', $this->nombre);
        $ps->bindParam(':apellido', $this->apellido);
        $ps->bindParam(':sexo', $this->sexo);
        $ps->bindParam(':direccion', $this->direccion);
        $ps->bindParam(':telefono', $this->telefono);
        $ps->bindParam(':edad', $this->edad);
        return $ps->execute();
    }
}
?>