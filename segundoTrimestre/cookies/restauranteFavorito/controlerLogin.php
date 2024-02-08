<?php
$serverName="localhost:3306";
$username="root";
$password="";
$nombreBBDD="restaurante";

if(isset($_SESSION["nombreLogin"]) && isset($_SESSION["contraLogin"])){
    session_start();
    $_SESSION['usuario']=array("nombre"=>$_SESSION["nombreLogin"],"contra"=>$_SESSION["contraLogin"]);

    header('platosElegir.php');
}
function comprobarUsuario($serverName,$username,$password,$nombreBBDD){
    $conn=new PDO("mysql:host=.$serverName;dbname=".$nombreBBDD.";charset=utf8",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->prepare("SELECT * FROM ");
    $conn=null;
}