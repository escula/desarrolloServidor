<?php
$serverName="localhost:3306";
$username="root";
$password="";
$nombreBBDD="restaurante";

    $conn=new PDO("mysql:host=".$serverName,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("DROP DATABASE IF EXISTS ".$nombreBBDD.";CREATE DATABASE IF NOT EXISTS ".$nombreBBDD);
    $conn=null;

    $ruta="mysql:host=$serverName;dbname=".$nombreBBDD.";charset=utf8";

   $conn=new PDO($ruta, $username, $password);
    $conn->exec("CREATE TABLE IF NOT EXISTS Usuarios(
        id int AUTO_INCREMENT PRIMARY KEY,
        nombre varchar(255) NOT NULL,
        contrasena varchar(255) NOT NULL
    );");

    $conn->exec("CREATE TABLE IF NOT EXISTS Platos(
        id int AUTO_INCREMENT PRIMARY KEY,
        nombre varchar(255) NOT NULL,
        precio int NOT NULL,
        categoria varchar(255) NOT NULL
    );");
    $conn=null;