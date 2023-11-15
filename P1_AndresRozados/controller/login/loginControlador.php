



<?php
include_once "../../model/BBDD.php" ;
include_once "../../templates/generadorVistas/generadorVistas.php";
include_once "../../model/cookies.php";
$conexionBD=new BBDD();
// GeneradorVista::generarVista([]);


if(isset($_POST["password"])){
    
    // include '../../constants/usuariosPrivilegios.php';
    include '../../templates/modalMensaje/modalMensaje.php';
    // include '../modificarTodo/modificarTodo.php';
    
    

    $empleados=$conexionBD->selectEmpleado($_POST["codigo_empleado"]);

    if(count($empleados)>0 ){//Si es menor de 1 significa que no ha coincidido con ningun empleado
        $idEmpleado=strval($empleados[0]["empleado_ID"]);
        if(substr($idEmpleado,0, 1)==$_POST["password"]){//Comprobando que ha introducido bien la contraseña
            echo "has entrado";
            
            $trabajo=$conexionBD->selectTrabajo($empleados[0]["Trabajo_ID"]);

            Cookies::crearCookie("codigoEmpleado",$idEmpleado,86400);
            Cookies::crearCookie("funcionEmpleado",$trabajo[0]["Funcion"],86400);
            print_r($trabajo);
            //Redirige a la siguiente vista
            header("Location:/exercices/P1_AndresRozados/templates/modificarTodo/modificarTodo.php");
            
        }else{//Se genera modal de contraeña mal introducida y por debajo el formulario de login
            // imprimir vista
            $frase= "ha initroducido mal la contraseña";
            GeneradorVista::generarVista(['../../templates/modalMensaje/modalMensaje.php','../../templates/login/login.php']
            ,["../../templates/modalMensaje/modalMensaje.css","../../templates/login/login.css"]);
            GeneradorModal::modalError($frase);
            
        }
    }else{//Se genera modal de usuario mal introducido y por debajo el formulario de login
        // imprimir vista
        $frase= "El usuario que intenta introducir no existe";
        GeneradorVista::generarVista(['../../templates/modalMensaje/modalMensaje.php','../../templates/login/login.php'],
        ["../../templates/reset.css","../../templates/modalMensaje/modalMensaje.css","../../templates/login/login.css"]);
        GeneradorModal::modalError($frase);
    }

}else{//Se genera modal de contraeña mal introducida y por debajo el formulario de login
    // imprimir vista
    GeneradorVista::generarVista(['../../templates/login/login.php'],
    ["../../templates/reset.css","../../templates/login/login.css"]);
}
$conexionBD->closeConnection();

?>

