 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        function restar(){
            if(isset($_GET['numeroUno']) && isset($_GET['numeroDos'])){
                $numero1=(int)htmlspecialchars($_GET['numeroUno']) ;
                $numero2=(int)htmlspecialchars($_GET['numeroDos']) ;
                echo "<p>Resta: ".$numero1." - ".$numero2 ." = ".$numero1-$numero2."</p>";
            }    
        }
        function multiplicar($numero1,$numero2){
            echo "<p>multiplicar: ".$numero1." * ".$numero2 ." = ".$numero1*$numero2."</p>";
        }

        
    ?>
</head>
<body>
    <form method="get" action="ejercicio3.php">
        <p>Numero1 : <input type="text" name="numeroUno" value="0"/> </p>
        <p>Numero2: <input type="text" name="numeroDos" value="0"/> </p>
        <p><input type="submit" /></p>
    </form>
    <?php
        if(isset($_GET['numeroUno']) && isset($_GET['numeroDos'])){
            $numero1=(int)htmlspecialchars($_GET['numeroUno']);
            $numero2=(int)htmlspecialchars($_GET['numeroDos']) ;

            echo "<p>suma: ".$numero1." + ".$numero2 ." = ".$numero1+$numero2."</p>";
            restar();
            multiplicar($numero1,$numero2);
            include "divisionYmodulo.php";
            dividir($numero1,$numero2);
            modulo($numero1,$numero2);
        }
        
    ?>
</body>
</html>

