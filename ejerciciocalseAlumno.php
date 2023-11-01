
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php
        
        include 'ejerciciocalseAlumnoserv.php';
        echo '<pre>';
        $alumnos=[];
        array_push($alumnos,new Alumno('Jesús','Garcia'));
        array_push($alumnos,new Alumno('Paula','Vazquez'));
        array_push($alumnos,new Alumno('Álvaro','Gómez'));
        array_push($alumnos,new Alumno('Santiago','melón'));
    
        foreach ($alumnos as $key =>$value) {
            echo $value;
        }
        // print_r($alumnos);
    ?>
</body>
</html>
