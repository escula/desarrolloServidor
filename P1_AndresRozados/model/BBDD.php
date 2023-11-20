<?php

class BBDD{
    private $conexion;
    public function  __construct($nombreServ="localhost:3306",$usuario="root",$password=""){

        $this->conexion=new PDO("mysql:host=$nombreServ;dbname=pufosa;charset=utf8", $usuario, $password);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    
    
    public function closeConnection(){
        $this->conexion=null;
    }
    public function selectTrabajo($idTrabajo){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM trabajos WHERE Trabajo_ID=?");

        $prepareStatement->bindParam(1, $idTrabajo, PDO::PARAM_INT);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    public function selectNombreTablas(){
        $prepareStatement=$this->conexion->prepare("SELECT table_name AS nombre
        FROM information_schema.tables WHERE table_schema = 'pufosa';");

        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    public function selectTodaTabla($nombreTabla){
        $prepareStatement=$this->conexion->prepare("SELECT * FROM ".$nombreTabla.";");
        // $prepareStatement->bindParam(':nombreTabla', $nombreTabla);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectEmpleado($id){//Se usa para el login solamente
        $prepareStatement=$this->conexion->prepare("SELECT * FROM empleados WHERE empleado_ID=?");

        $prepareStatement->bindParam(1, $id, PDO::PARAM_STR);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }

    public function obtenerNombreColumnas($nombreTabla){
        $prepareStatement=$this->conexion->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = :nomTabla ;");

        $prepareStatement->bindParam(":nomTabla", $nombreTabla, PDO::PARAM_STR);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    /**
     * Funcion para obtener información extra sobre una tabla
     * 
     *[0] => Array(
     * 
     *         [COLUMN_NAME] => CLIENTE_ID
     * 
     *         [DATA_TYPE] => decimal
     * 
     *         [IS_NULLABLE] => NO
     * 
     *         [COLUMN_TYPE] => decimal(6,0)
     * 
     *     )
     * 
     * [1] => Array
     * 
     *     (
     * 
     *         [COLUMN_NAME] => nombre
     * 
     *         [DATA_TYPE] => varchar
     * 
     *      [IS_NULLABLE] => YES
     * 
     *         [COLUMN_TYPE] => varchar(45)
     * 
     *     )
     * 
     *
     * @access public
     * @param string $nombreTabla Nota: que coincida con la BD
     * @return Array|false Nota: si es false es que ha fallado la consulta
     */
    function obtenerMetaDatosTabla($nombreTabla){
        // COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_TYPE
        $prepareStatement=$this->conexion->prepare("SELECT *
        FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = :nomTabla");

        $prepareStatement->bindParam(":nomTabla", $nombreTabla, PDO::PARAM_STR);
        $prepareStatement->execute();
        return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);


    }
    /**
     * tabla: string
     * Nota:El primer numero del arrayConNombreColumnaYValor simpre debe ser el id para que funcione la funcion
     */
    public function modificarCualquierFila($arrayConNombreColumnaYValor,$tabla,$antiguoValordePK){
        // UPDATE table_name
        // SET column1 = value1, column2 = value2, ...
        // WHERE condition;
        
        $sentencia='UPDATE '.$tabla.' SET ';
        foreach ($arrayConNombreColumnaYValor as $nombreColumna => $valorColumna) {
            $sentencia.=$nombreColumna." = ".$valorColumna.", ";
        }
        
        $sentencia=substr($sentencia,0,strlen($sentencia)-2);//Eliminando los dos ultimos caracter en el string (la coma y espacio)
        $primeraClave=array_key_first($arrayConNombreColumnaYValor);
        $sentencia.=' WHERE '.$primeraClave.' = '.$antiguoValordePK;
        $sentencia.=";";
        $resultado= $this->conexion->exec($sentencia);
        return $resultado;
    }

    public function insertarCualquierCosa($arrayConNombreColumnaYvalor,$nomTabla){
        $sentencia="INSERT INTO ".$nomTabla." VALUES (";
        $numero=1;
        foreach ($arrayConNombreColumnaYvalor as $nombreCol => $valorAIntroducir) {
            $sentencia.='"'.$valorAIntroducir.'", ';

        }
        // echo "antesDeSubString: ".$sentencia;
        $sentencia=substr($sentencia,0,strlen($sentencia)-2);//Eliminando los dos ultimos caracter en el string (la coma y espacio)
        $sentencia.=");";
        // echo "\n";
        // echo $sentencia;
        // echo "\na";
        $resultado= $this->conexion->exec($sentencia);
        // echo "el resultado es: ".$resultado;
        return $resultado;
}

    public function eliminarFila($nombreTabla,$nombreColumnaID,$idDefilaBorrar){
        $resultado=$this->conexion->exec("DELETE FROM ".$nombreTabla." WHERE ".$nombreColumnaID." = ".$idDefilaBorrar);
        return $resultado;
        // $prepareStatement=$this->conexion->prepare("DELETE FROM ".$nombreTabla." WHERE  = :id");
        // $prepareStatement->bindParam(':nombreCol',$nombreColumnaID,PDO::PARAM_STR);
        // $prepareStatement->bindParam(':id',$idDefilaBorrar,PDO::PARAM_INT);
        // return $prepareStatement->execute();
    }
    public function obtenerInforme(){
        $sentencia='SELECT departamento.Departamento_ID, 
        ubicacion.Ubicacion_ID as "ubicacionID", 
        departamento.Nombre as "nombreDepart", 
        count(empleados.empleado_ID) as "numero de empleado",
        avg(empleados.Salario) as "suedo medio",
        min(empleados.Salario) as "suedo Minimo",
        max(empleados.Salario) as "suedo Maximo"
        
        FROM ubicacion 
        INNER JOIN departamento 
           ON(ubicacion.Ubicacion_ID = departamento.Ubicacion_ID)
        INNER JOIN empleados 
            ON (departamento.Departamento_ID = empleados.Departamento_ID)
        GROUP BY departamento.Departamento_ID
        ORDER BY departamento.Departamento_ID;';
        $sentenciaResultado=$this->conexion->query($sentencia);
        $resultadoFinal=[];

        while($linea = $sentenciaResultado->fetch()){
            array_push($resultadoFinal,$linea);
        }
        return $resultadoFinal;
    }
}
?>