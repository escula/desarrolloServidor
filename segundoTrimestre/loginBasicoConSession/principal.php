<?php
if(session_status()!==PHP_SESSION_ACTIVE && contrasenaCorrecta($_GET['nombre'],$_GET['contrasena'])){//Si no existe la sesion
    session_start();
    $_SESSION['nombre'] = $_GET['nombre'];
    $_SESSION['contrasena'] = $_GET['contrasena'];
    echo '<h1>HOla '.$_SESSION["nombre"]?? "desconocido".'></h1>';
    echo '<a href="datos.php">Consultar datos</a>';
}else{
    echo '<h1>Crack pon bien los datos</h1>';
    echo '<a href="formulario.php">volver a login</a>';
}

function contrasenaCorrecta($nombre,$contra){
    $bbdd=new PDO("mysql:host=localhost:3307;dbname=sesiones;charset=utf8", "root", "");
    $bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ps=$bbdd->prepare("SELECT * FROM usuarios WHERE nombre=? and contrasena=?");
    $ps->bindParam(1,$nombre);
    $ps->bindParam(2,$contra);
    $ps->execute();
    $resultado=$ps->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultado)>0){
        return true;
    }
    return false;
}
?> 

