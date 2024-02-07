<?php

use Ramsey\Uuid\Type\Integer;

$serverName="localhost:3306";
$username="root";
$password="";
$nombreBBDD="safcfsad";



$conn=new PDO("mysql:host=".$serverName,$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conn=new PDO("mysql:host=.$serverName;dbname=".$nombreBBDD.";charset=utf8",$username,$password);


if(defined('PASSWORD_ARGON2ID')) {
    
    $hash=password_hash($contraseña,PASSWORD_ARGON2ID);//Es mas robusta y mas nueva que bcrypt pero es más lenta, siendo más resistente a ataques de canal lateral
}else{
    $coste = calcularComplejidadMaxima(0.355);
    $contraseña="1234";
    $options=['cost'=>$coste];
    $hash=password_hash($contraseña,PASSWORD_DEFAULT,$options);//Usa bcrypt por detrás
}
    
    //Generar Usuarios
    $conn->exec('INSERT INTO Usuarios (nombre,contrasena) VALUES ("paco","'.$hash.'");');
    $conn->exec('INSERT INTO Usuarios (nombre,contrasena) VALUES ("pablo","'.$hash.'");');

    //GEnerar platos
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("carne",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("lentejas",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("aire",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("pan",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("lechuguita",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("Wasabi",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("Anchoa",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("Pasta",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("Plastico",'.calcularPrecio().',"'.elegirCategoria().'")');
    $conn->exec('INSERT INTO Platos (nombre,precio,categoria) VALUES ("Caramelo",'.calcularPrecio().',"'.elegirCategoria().'")');
    
    

//Sirve para calcular la complejidad maxima de
function calcularComplejidadMaxima($tiempoMaximo){
    $timeTarget = $tiempoMaximo;

    $cost = 5;
    do {
        $cost++;
        $start = microtime(true);
        password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
        $end = microtime(true);
    } while (($end - $start) < $timeTarget);

    return $cost;
}

function calcularPrecio() : int {
    return rand(1,30) ;
}
function elegirCategoria() : string {
    $categorias=["vegano","sin gluten", "sin lactosa","normal"];
    $categoriaElegida=$categorias[rand(0,count($categorias)-1)];
    return $categoriaElegida ;
}