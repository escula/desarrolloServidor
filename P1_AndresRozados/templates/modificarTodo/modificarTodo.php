<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modificarTodo.css">
    <script defer src="./moverBarraLateral.js"></script>
    <script defer src="./eventos.js"></script>
</head>
<body class="grid-principal">
    
    <header>
        <nav>
            <ul>
                <li><?=$_COOKIE["funcionEmpleado"]?? "error No ha cardado cookie"?></li>
                <li class="salir"><a href="../../controller/login/loginControlador.php"><img src="./../../assets/exit.svg" alt="salir"></a></li>
            </ul>
        </nav>    
    </header>
    <aside>
        <ul>
            <?php
                include_once '../../constants/usuariosPrivilegios.php';

                if(isset($_COOKIE["funcionEmpleado"])){
                    $funcionEmpleadoIniciadaSesion=$_COOKIE["funcionEmpleado"];
                    
                    $tablasConPermisosDeAcceso=$privilegios[$funcionEmpleadoIniciadaSesion];
                    foreach ($tablasConPermisosDeAcceso as $key=>$value) {
                        echo '<li>'.$value.'</li>';

                }
                };
                
                
            ?>
        </ul>
        <hr id="delimitador-0">

    </aside>
    <main>
        <div class="modal-inicial">
            <p>Selecciona alguna tabla en el menu lateral</p>
        <div>
        <!-- style="display:block;height: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cupiditate, in quidem repellat magni consectetur adipisci neque nulla quae velit.</div> -->
    </main>
    <display id="modalConfirmacion" class="modal">
        <p>Mensaje del modal Lorem*3</p>
    </display>
</body>

</html>