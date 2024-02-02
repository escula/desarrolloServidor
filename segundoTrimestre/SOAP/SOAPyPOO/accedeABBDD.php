<?php
class AccedeABBDD
{
    public function getBBDD($nombreAnimal)
    {
        $resultado = false;
        $conexion = new PDO("mysql:host=localhost:3307;dbname=protectora_animales;charset=utf8", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $ps = $conexion->prepare("SELECT * FROM animal WHERE :nombreAnimal = nombre");
        $ps->bindParam(":nombreAnimal", $nombreAnimal);
        $ps->execute();
        $perro = $ps->fetchAll();
        if (count($perro) > 0) {
            $resultado = true;
            
        }
        return $resultado;
    }
}