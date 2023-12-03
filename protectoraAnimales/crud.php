<?php
include_once './protectoraAnimales/conexion.php';

abstract class Crud extends Conexion{
    private $tabla;
    private $conexion;
    public function __construct($nombreTabla){
        parent::__construct();
        $this->tabla=$nombreTabla;
        $this->conexion=parent::conection();

    }
    public function obtieneToddos(){
        $prepareStatement=$this->conexion->prepare('SELECT * FROM '.$this->tabla);
        $prepareStatement->execute();
        return $prepareStatement->fetchObject(__CLASS__);

    }

    public function obtieneId($id){
        $prepareStatement=$this->conexion->prepare('SELECT * FROM '.$this->tabla."WHERE id= :id");
        $prepareStatement->bindParam(':id', $id, PDO::PARAM_STR);
        $prepareStatement->execute();
        return $prepareStatement->fetch();
    }
    public function borrar($id){
        $prepareStatement=$this->conexion->prepare('DELETE FROM '.$this->tabla."WHERE id= :id");
        $prepareStatement->bindParam(':id', $id, PDO::PARAM_STR);
        $prepareStatement->execute();
    }
    abstract function crear();
    abstract function actualizar();
}

?>