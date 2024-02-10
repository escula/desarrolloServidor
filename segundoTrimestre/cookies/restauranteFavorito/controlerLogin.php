<?php
$serverName="localhost:3306";
$username="root";
$password="";
$nombreBBDD="restaurante";

if(isset($_GET["nombreLogin"]) && isset($_GET["contraLogin"])){
    session_start();
    
    if(comprobarUsuario($_GET["nombreLogin"],$_GET["contraLogin"],$serverName,$nombreBBDD,$password,$username)){
        $_SESSION['usuario']=array("nombre"=>$_GET["nombreLogin"],"contra"=>$_GET["contraLogin"]);
        header('Location: platosElegir.php');
    }else{
        echo "hola";
        // header('login.php');
    }
}

function comprobarUsuario($username,$contraLogin,$serverHost,$nameBBDD,$passwordBBDD,$nombreUsuario){
    $resultado=false;

    $conn=new PDO("mysql:host=$serverHost;dbname=".$nameBBDD.";charset=utf8",$nombreUsuario,$passwordBBDD);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pr =$conn->prepare("SELECT * FROM Usuarios WHERE nombre = :nombre");
    $pr->bindParam(':nombre', $username, PDO::PARAM_STR);
    $pr->execute();
    $resultadoSQL =$pr->fetchAll(PDO::FETCH_ASSOC);

    if(count($resultadoSQL)>0){//separando en dos if la comparación es menos larga y devuelve antes el resultado
        if(password_verify($contraLogin,$resultadoSQL[0]["contrasena"])){
            $resultado=true;
        }
    }

    $conn=null;
    return $resultado;
}