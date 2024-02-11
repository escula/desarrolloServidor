<?php include_once("BBDD.php");
$serverName="localhost:3306";
$username="root";
$password="";
$nombreBBDD="restaurante";

if(isset($_GET["nombreLogin"]) && isset($_GET["contraLogin"]) && comprobarUsuario($_GET["nombreLogin"],$_GET["contraLogin"])){
    session_start();
    
    $_SESSION['usuario']=array("nombre"=>$_GET["nombreLogin"],"contra"=>$_GET["contraLogin"]);
    header('Location: controlerPlatosElegir.php?VengoDeLogin=');
    
}else{
    header('Location: login.php');
}

function comprobarUsuario($username,$contraLogin){
    $resultado=false;

    $bd=new BBDD();
    
    $resultadoSQL=$bd->obtenerTodosUsuario($username);
    if(count($resultadoSQL)>0){//separando en dos if la comparación es menos larga y devuelve antes el resultado
        if(password_verify($contraLogin,$resultadoSQL[0]["contrasena"])){
            $resultado=true;
        }
    }

    $conn=null;
    return $resultado;
}