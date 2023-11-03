<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="server.php" method="post">
    <label for="">Elige:</label>
    <fieldset>
        <input type="radio" name="eleccionPersona" value="piedra">
        <label >Piedra</label>
        <input type="radio" name="eleccionPersona" value="tijera">
        <label >tijera</label>
        <input type="radio" name="eleccionPersona" value="papel">
        <label >papel</label>
        <input type="hidden"name="ganaMaquina" value="<?=$rondasGanaMaquina??0?>">
        <!-- Si se quiere pasar un array completo ha un formulario hay que serializarlo -->
        <input type="hidden"name="ganaPersona" value="<?=$rondasGanaMaquina??0?>">
        <input type="hidden"name="ganaMaquina">
        
    </fieldset>
    <button>Jugar</button>
</form>    
</body>
</html>
<?php
    if(isset($_POST["ganaPersona"])){
         $nombre=$_POST["eleccionPersona"];
         $telefono=$_POST["eleccionPersona"];
         $apellido=$_POST["eleccionPersona"];
         $correo=$_POST["eleccionPersona"];

    }

?>