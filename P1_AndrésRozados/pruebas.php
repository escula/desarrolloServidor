<?php
    include './model/BBDD.php';
    $conexion=new BBDD();
    $hola=$conexion->selectNombreTablas();
    print_r($hola);
?>