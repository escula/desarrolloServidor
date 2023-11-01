<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php
    echo "";
    ?>

    <section>
        <header>q quieres hacer?</header>
        <form action="">
                <button>Crear Alumno</button>
                <button>Buscar Alumno</button>
                <button>Modificar Alumno</button>
                <button>Eliminar Alumno o alumnos</button>
        </form>
    </section>


</body>

</html>
<?php
include("BBDD.php");
$bd=new BBDD();
$bd->deleteAlumno("Roberto");
$alumno=$bd->selectAlumno("andres");
print_r($alumno);
$bd->updateAlumno("LAURA","paco","ramirez",2131,"fsfdsd.dasdas");

// $bd->insertarAlumno("Roberto","Lorca",32432,"fasuia@fsmio");

//  $conexion=new PDO("mysql:host=localhost:3307;dbname=myDBPDO;charset=utf8", "root", "");
//  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  $nombre="Andres";
//  $apellido="Rozados";
//  $telefono=123421;
//  $correo="micorreo@sda.dsa";
//  $prepareStatement=$conexion->prepare("INSERT INTO alumnos (nombre,apellidos,telefono,correo) VALUES (:nombre,:apellido,:telefono,:correo)");

//     $prepareStatement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
//     $prepareStatement->bindParam(':apellido', $apellido, PDO::PARAM_STR);
//     $prepareStatement->bindParam(':telefono', $telefono, PDO::PARAM_INT);
//     $prepareStatement->bindParam(':correo', $correo, PDO::PARAM_STR);
//     return $prepareStatement->execute();















// echo "</pre>";

// echo("Antes contructor");
// $bbdd=new BBDD();

// echo "</br>".gettype($bbdd->getConexion());

// echo("</br>despues contructor");
// $bbdd->deleteAlumno("andres");
// $bbdd->insertarAlumno("andres","Rozados",2131,"SegundoCorreo@fnasiof");

// $lista=$bbdd->selectAlumno("andres");
// foreach ($lista as $fila) {
//     echo $fila["NOMBRE"];
// }


// $bbdd->closeConnection();
?>