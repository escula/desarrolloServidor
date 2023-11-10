<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modificarTodo.css">
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li>Presidente</li>
                <li class="salir"><img src="./../../assets/exit.svg" alt="salir"></li>
            </ul>
        </nav>    
    </header>
    <aside>
        <ul>
            <?php
                include '../../model/BBDD.php';
                $con=new BBDD();
                $nombreTablas=$con->selectNombreTablas();
                foreach ($nombreTablas as $nombreTabla) {
                    echo "<li>.$nombreTabla.</li>";
                }
            ?>
            <!-- <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li>
            <li><a href="http://">Invitados</a></li>
            <li><a href="http://">hfiaofhoiafhoiahoi</a></li>
            <li ><a href="http://">Empleados</a></li>
            <li >aw4srextdcyvgubhinjzexrtcyivuobi</li> -->
        </ul>


    </aside>
    <main>
        <div style="display:block;height: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cupiditate, in quidem repellat magni consectetur adipisci neque nulla quae velit.</div>
    </main>
</body>

</html>