<?php
session_start();

$bbdd=new PDO("mysql:host=localhost:3307;dbname=sesiones;charset=utf8", "root", "");
$bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$ps=$bbdd->prepare("SELECT nombre, apellido, numero, fecha FROM usuarios WHERE nombre=?");

$ps->bindParam(1,$_SESSION['nombre']);

$ps->execute();

$resultado=$ps->fetchAll(PDO::FETCH_ASSOC);

print_r($resultado);


for ($i=0; $i < count($resultado); $i++) { 
    foreach ($resultado[$i] as $key => $value) {
        echo "<p>".$key." : ".$value."</p>";
    }
}

?>

