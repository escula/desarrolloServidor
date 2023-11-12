<?php

class BBDD{
    public $conexion;
    public function  __construct($nombreServ="localhost:3306",$usuario="root",$password=""){

        $this->conexion=new PDO("mysql:host=$nombreServ;dbname=pufosa;charset=utf8", $usuario, $password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    
    function closeConnection(){
        $this->conexion=null;
    }
    public function getConexion(){
        return $this->conexion;
    }
    function selectTrabajos($idTrabajo){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM trabajos WHERE Trabajo_ID=?");

        $prepareStatement->bindParam(1, $idTrabaj, PDO::PARAM_STR);
        $prepareStatement->execute();
        echo "fufa";
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    function selectNombreTablas(){
        $prepareStatement=$this->conexion->prepare("SELECT table_name AS nombre
        FROM information_schema.tables WHERE table_schema = 'pufosa';");

        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    public function insertarAlumno($nombre,$apellido,$telefono,$correo){
            $prepareStatement=$this->conexion->prepare("INSERT INTO empleados (nombre,apellidos,telefono,correo) VALUES (:nombre,:apellido,:telefono,:correo)");
            
            $prepareStatement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $prepareStatement->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $prepareStatement->bindParam(':telefono', $telefono, PDO::PARAM_INT);
            $prepareStatement->bindParam(':correo', $correo, PDO::PARAM_STR);
            return $prepareStatement->execute();
            

    }

    function deleteAlumno($nombre){
        $prepareStatement=$this->conexion->prepare("DELETE FROM alumnos WHERE nombre=:nombre");

        // DELETE FROM table_name WHERE condition;
        $prepareStatement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        return $prepareStatement->execute();


    }
    function selectEmpleado($id){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM empleados WHERE empleado_ID=?");

        $prepareStatement->bindParam(1, $id, PDO::PARAM_STR);
        $prepareStatement->execute();
        echo "fufa";
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    function updateAlumno($alumnoActualizar,$nombre,$apellido,$telefono,$correo){
        $prepareStatement=$this->conexion->prepare("UPDATE alumnos SET nombre= ?,apellidos=?,telefono=?,correo=? WHERE nombre =?");
        $prepareStatement->bindParam(1, $nombre, PDO::PARAM_STR);
        $prepareStatement->bindParam(2, $apellido, PDO::PARAM_STR);
        $prepareStatement->bindParam(3, $telefono, PDO::PARAM_INT);
        $prepareStatement->bindParam(4, $correo, PDO::PARAM_STR);
        $prepareStatement->bindParam(5,$alumnoActualizar);
        // $actualizar=$this->conexion->query("UPDATE alumnos SET nombre =".$nombre.", apellidos =".$apellido.", telefono = ".$telefono."correo=" .$correo." WHERE nombre = ".$alumnoActualizar.";");
        return $prepareStatement->execute();
    }
}
?>