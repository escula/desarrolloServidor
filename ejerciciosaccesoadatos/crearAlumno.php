<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="crearAlumno.php" method="post">
        <fieldset>
            <legend>Introducier en base de datos un nuevo usuario</legend>
            <label >nombre:</label>
            <input type="text" placeholder="andres manuel" name="nombre" required/>
            <label >apellido:</label>
            <input type="text" placeholder="Gola Mola" name="apellido" required/>
            <label >telefono:</label>
            <input type="text" placeholder="123456789" name="telefono" required pattern="[0-9]*9" title="Debe introducir 9 numeros Ej:000435323"/>
            <label >correo:</label>
            <input type="text" placeholder="correo" name="correo" value="<?=$correo?>" required pattern="^[A-Za-z0-9](([a-zA-Z0-9,=\.!\-#|\$%\^&\*\+/\?_`\{\}~]+)*)@(?:[0-9a-zA-Z-]+\.)+[a-zA-Z]{2,9}$" title="Debe introducir un correo con @"/>
            <input type="number" hidden name="entrado" value="1">
            <button>Crear Usuario</button>
            
        </fieldset>    
    </form>

</body>
<?php
    include 'BBDD.php';
    
    $nombre=$_POST["nombre"];
    $telefono=$_POST["apellido"];
    $apellido=$_POST["telefono"];
    $correo=$_POST["correo"];
    $bd=new BBDD();
    $bd->insertarAlumno($nombre,$telefono,$apellido,$correo);
    $bd->closeConnection();
    echo "<table>
        <tr>
            <th>nombre</th>
            <th>apellido</th>
            <th>telefono</th>
            <th>correo</th>
        </tr>
        <tr>
            <td>$nombre</td>
            <td>$telefono</td>
            <td>$apellido</td>
            <td>$correo.</td>
        </tr>
        </table>";
    
    
    
        
    
    
    
?>
</html>
