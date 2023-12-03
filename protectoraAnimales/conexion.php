<?php
class Conexion{
    private $nombreDB;
    private $user;
    private $contraDB;

    function __construct($nombreDB="protectora_animales",$usuario="root",$contrasena="")
    {
        $this->nombreDB=$nombreDB;
        $this->user=$usuario;
        $this->contraDB=$contrasena;
    }
    
    protected function conection(){
        try {
            $conexion= new PDO("mysql:host= $this->nombreDB;dbname=myDBPDO;charset=utf8", $this->user, $this->contraDB);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo $e;
        }
    
    }
    
}
?>