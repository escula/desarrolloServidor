<?php

class BBDD{
    private $conexion;
    public function  __construct($serverName="localhost:3306",$nombreBBDD='restaurante',$username="root",$password=""){

        $this->conexion=new PDO("mysql:host=$serverName;dbname=" . $nombreBBDD . ";charset=utf8", $username, $password);;
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    
    function closeConnection(){
        $this->conexion=null;
    }

    public function obtenerTodosLosPlatos(){
        $prepareStatement = $this->conexion->prepare('SELECT * FROM Platos');
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);   

    }

    public function obtenerPlatoPrecio(){
        $prepareStatement = $this->conexion->prepare('SELECT nombre, precio FROM Platos');
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);   

    }

    public function obtenerTodosUsuario($username){
        $pr =$this->conexion->prepare("SELECT * FROM Usuarios WHERE nombre = :nombre");
        $pr->bindParam(':nombre', $username, PDO::PARAM_STR);
        $pr->execute();
        return $pr->fetchAll(PDO::FETCH_ASSOC);   

    }
}
