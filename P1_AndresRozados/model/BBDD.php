<?php

class BBDD{
    private $conexion;
    public function  __construct($nombreServ="localhost:3307",$usuario="root",$password=""){

        $this->conexion=new PDO("mysql:host=$nombreServ;dbname=pufosa;charset=utf8", $usuario, $password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    
    function closeConnection(){
        $this->conexion=null;
    }
    function selectTrabajo($idTrabajo){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM trabajos WHERE Trabajo_ID=?");

        $prepareStatement->bindParam(1, $idTrabajo, PDO::PARAM_INT);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    function selectNombreTablas(){
        $prepareStatement=$this->conexion->prepare("SELECT table_name AS nombre
        FROM information_schema.tables WHERE table_schema = 'pufosa';");

        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    function selectTodaTabla($nombreTabla){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM ".$nombreTabla.";");
        // $prepareStatement->bindParam(':nombreTabla', $nombreTabla);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    function selectEmpleado($id){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM empleados WHERE empleado_ID=?");

        $prepareStatement->bindParam(1, $id, PDO::PARAM_STR);
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
    public function eliminarFila($nombreTabla,$nombreColumnaID,$idDefilaBorrar){
        $resultado=$this->conexion->exec("DELETE FROM ".$nombreTabla." WHERE ".$nombreColumnaID." = ".$idDefilaBorrar);
        return $resultado;
        // $prepareStatement=$this->conexion->prepare("DELETE FROM ".$nombreTabla." WHERE  = :id");
        // $prepareStatement->bindParam(':nombreCol',$nombreColumnaID,PDO::PARAM_STR);
        // $prepareStatement->bindParam(':id',$idDefilaBorrar,PDO::PARAM_INT);
        // return $prepareStatement->execute();
    }


    // function deleteAlumno($nombre){
    //     $prepareStatement=$this->conexion->prepare("DELETE FROM alumnos WHERE nombre=:nombre");

    //     // DELETE FROM table_name WHERE condition;
    //     $prepareStatement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    //     return $prepareStatement->execute();


    // }
    
    // function updateAlumno($alumnoActualizar,$nombre,$apellido,$telefono,$correo){
    //     $prepareStatement=$this->conexion->prepare("UPDATE alumnos SET nombre= ?,apellidos=?,telefono=?,correo=? WHERE nombre =?");
    //     $prepareStatement->bindParam(1, $nombre, PDO::PARAM_STR);
    //     $prepareStatement->bindParam(2, $apellido, PDO::PARAM_STR);
    //     $prepareStatement->bindParam(3, $telefono, PDO::PARAM_INT);
    //     $prepareStatement->bindParam(4, $correo, PDO::PARAM_STR);
    //     $prepareStatement->bindParam(5,$alumnoActualizar);
    //     // $actualizar=$this->conexion->query("UPDATE alumnos SET nombre =".$nombre.", apellidos =".$apellido.", telefono = ".$telefono."correo=" .$correo." WHERE nombre = ".$alumnoActualizar.";");
    //     return $prepareStatement->execute();
    // }
}
?>