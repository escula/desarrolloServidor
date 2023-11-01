<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio9.php" method="get">
        <input type="text" name="numeroSemana" placeholder="Introduzca un numero entre 1 y 7" pattern="[1-7]" title="Numero entre 1 y 7">
        <input type="submit" name="evia pendejo">
    </form>
    <?php
    if(isset($_GET["numeroSemana"])){
        $numeroSemana=$_GET["numeroSemana"];
        switch ($numeroSemana) {
            case 1:
           echo "Martes";
           # code...
                break;
            case 2:
           echo "Martes";
                break;
            case 3:
           echo "Miercoles";
           # code...
                break;
            case 4:
           echo "Jueves";
           # code...
                break;
            case 5:
           echo "Viernes";
           # code...
                break;
            case 6:
           echo "Sabado";
           # code...
                break;
            default:
           echo "Domingo";
           # code...
                break;
        }
    }
    ?>
</body>
</html>
