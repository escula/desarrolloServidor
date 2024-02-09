<?php


$serverName="localhost:3306";
$username="root";
$password="";
$nombreBBDD="restaurante";
$contraseña="1234";





$conn=new PDO("mysql:host=$serverName;dbname=".$nombreBBDD.";charset=utf8",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(defined('PASSWORD_ARGON2ID')) {

    $hashContra=password_hash($contraseña,PASSWORD_ARGON2ID);//Es mas robusta y mas nueva que bcrypt pero es más lenta, siendo más resistente a ataques de canal lateral
}else{
    // $coste = calcularComplejidadMaxima(0.355);
    $coste=12;
    $options=['cost'=>$coste];
    $hashContra=password_hash($contraseña,PASSWORD_BCRYPT,$options);//Usa bcrypt por detrás
}
    
    //Generar Usuarios
    $conn->exec('INSERT INTO Usuarios (nombre,contrasena) VALUES ("paco","'.$hashContra.'");');
    $conn->exec('INSERT INTO Usuarios (nombre,contrasena) VALUES ("pablo","'.$hashContra.'");');

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
$conn=null;