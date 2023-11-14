



<?php
include "../../model/BBDD.php" ;
$conexionBD=new BBDD();
if(isset($_POST["password"])){
    
    // include '../../constants/usuariosPrivilegios.php';
    // include '../modalMensaje/modalMensaje.php';
    // include '../modificarTodo/modificarTodo.php';
    
    // imprimir vista

    $empleado=$conexionBD->selectEmpleado($_POST["codigo_empleado"]);
    
    if(count($empleado)>0 ){//Si es menor de 1 significa que no ha coincidido con ningun empleado
        $idEmpleado=strval($empleado[0]["empleado_ID"]);

        if(substr($idEmpleado,0, 1)==$_POST["password"]){
            echo "has entrado";
            $conexionBD->selectEmpleado($_POST["name"]);
            $trabajo=$conexionBD->selectTrabajo($idEmpleado[0]["Trabajo_ID"]);
            $funcion=$trabajo[0]["Funcion"];
            setcookie("tipo_usuario",$funcion);
            
        }else{
            $frase= "ha initroducido mal la contraseña";
            GeneradorModal::modalError($frase);
        }
    }else{
        $frase= "El usuario que intenta introducir no existe";
        GeneradorModal::modalError($frase);
    }

}


?>

