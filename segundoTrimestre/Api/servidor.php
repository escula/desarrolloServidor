<?php

$conne=new PDO("mysql:host=localhost:3307;dbname=alumnos;charset=utf8","root","");
$conne->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_GET['todos'])){
    header("HTTP/1.1 200 OK");
    $sql = $conne->prepare("SELECT * FROM alumnos");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    echo json_encode( $sql->fetchAll());
    exit();
}
if(isset($_GET['id'])){
    header("HTTP/1.1 200 OK");
    $sql = $conne->prepare("SELECT * FROM alumnos WHERE CODIGO= ".$_GET['id']);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    echo json_encode( $sql->fetchAll());
    exit();
}

if($_REQUEST['']){
    echo $_GET['a'];
    echo "hola";
//    header("HTTP/1.1 200 OK");
    $body=file_get_contents('php://input');
//    $introducir=json_decode($body,true);
//    $nombre=$introducir["nombre"];
//    $apellidos=$introducir["apellidos"];
//    $telefono=$introducir["telefono"];
//    $correo=$introducir["correo"];
//    print_r($introducir);
//    $sql = $conne->prepare("INSERT INTO alumnos (NOMBRE, APELLIDOS, TELEFONO,CORREO) VALUES (${$nombre}, ${$apellidos},${$telefono},${$correo})");
//    echo $sql->execute();
//    $sql->setFetchMode(PDO::FETCH_ASSOC);


    exit();
}
if(isset($_POST['r'])){
    header("HTTP/1.1 200 OK");
    $sql = $conne->prepare("SELECT * FROM alumnos WHERE CODIGO= ".$_GET['id']);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    echo json_encode( $sql->fetchAll());
    exit();
}