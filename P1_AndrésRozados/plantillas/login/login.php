<?php
if(isset($_POST["password"])){
    include "../../model/BBDD.php" ;
    include "../modificarTodo/modificarTodo.php";
    include '../../constants/usuariosPrivilegios.php';
    print-r($privilegios);
    new BBDD();
    echo "hola";

    $empleado=$conexionBD->selectEmpleado($_POST["name"]);
    
    print_r($empleado);
    if(count($empleado)>0 ){
        $idEmpleado=strval($empleado[0]["empleado_ID"]);

        if(substr($idEmpleado,0, 1)==$_POST["password"]){
            echo "has entrado";
            $conexionBD->selectEmpleado($_POST["name"]);
            $trabajo=$conexionBD->selectTrabajos($idEmpleado[0]["Trabajo_ID"]);
            $funcion=$trabajo[0]["Funcion"];
            if($funcion== "PRESIDENTE" ||$funcion== "PRESIDENTE"){
                
            }
        }else{
            echo "ha initroducido mal la contraseña";
        }
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
</head>
<body>
    <main>
        <section>
            <form action="login.php" method="post">
                <div>
                    <label >Usuario</label>
                    <input class="entrada" name="name" value="7954"type="text" placeholder="Paco Malano" required>
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