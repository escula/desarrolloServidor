<?php
if(isset($_POST["password"])){
    include "../../model/BBDD.php" ;
    include '../../constants/usuariosPrivilegios.php';
    include '../modalMensaje/modalMensaje.php';
    $conexionBD=new BBDD();

    $empleado=$conexionBD->selectEmpleado($_POST["codigo_empleado"]);
    
    if(count($empleado)>0 ){
        $idEmpleado=strval($empleado[0]["empleado_ID"]);

        if(substr($idEmpleado,0, 1)==$_POST["password"]){
            echo "has entrado";
            $conexionBD->selectEmpleado($_POST["name"]);
            $trabajo=$conexionBD->selectTrabajo($idEmpleado[0]["Trabajo_ID"]);
            $funcion=$trabajo[0]["Funcion"];
            setcookie("tipo_usuario",$funcion);
            exit;
        }else{
            $frase= "ha initroducido mal la contraseña";
            GeneradorModal::modalError($frase);
        }
    }else{
        echo"hola";
        $frase= "El usuario que intenta introducir no existe";
        GeneradorModal::modalError($frase);
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pufosa</title>
    <link rel="icon" type="image/x-icon" href="../../assets/logoMarca.jpeg">
    <link rel="stylesheet" href="login.css">
    <script type="module" src=""></script>
    <link rel="stylesheet" href="../modalMensaje/modalMensaje.css">
</head>
<body>
    <main>
        <section>
            <form action="login.php" method="post">
                <div>
                    <label >Usuario</label>
                    <input class="entrada" name="codigo_empleado" value="<?= $_COOKIE["tipo_usuario"]??""?>"type="text" placeholder="Paco Malano" required>
                    <label >Contraseña</label>
                    <input class="entrada" name="password"type="password"placeholder="almorranas" required>
                </div>
                
                <header>
                    <button>Iniciar sesión</button></form>
                </header>
                

        </section>
    </main>
</body>

</html>