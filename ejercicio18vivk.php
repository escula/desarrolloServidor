<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="ejercicio18.php" method="get">
        <input type="number" name="numeroAleatorio" value=<?= $loco?> />
        <input type="submit">
    </form>
    <?php
    function calcularPares($numero)
    {

        global $NumeroAnterior;
        $sumaTotal=0;
        if(isset($_GET["numeroAleatorio"])){
            $numero=$_GET["numeroAleatorio"];
            for($i=2;$i<=$numero;$i++){
                if($i<=$numero && $i%2==0){
                    $sumaTotal=$sumaTotal+$i;
                }
            }
            $NumeroAnterior=$sumaTotal;
            
            echo "numero total".$sumaTotal;
        
        }
    }
    
    if(isset($_GET["numeroAleatorio"])){
        $numero=$_GET["numeroAleatorio"];     
        calcularPares($numero);
    }else{
        $numero="";
    }

    ?>
</body>

</html>