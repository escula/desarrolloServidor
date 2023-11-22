<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

    if(isset($_GET["numeroAleatorio"]) && isset($_GET["acumulado"])){
        $numero=intval($_GET["numeroAleatorio"]); 
            
        $numeroAcumulado=intval($_GET["acumulado"]);
        $numeroAcumulado=$numero+$numeroAcumulado;
        echo "</br>".$numeroAcumulado;

        
    }else{
        $numero="";
        $numeroAcumulado=0;
    }

?>
<body>
    <form action="ejercicio18sumarNum.php" method="get">
        <input type="number" name="numeroAleatorio" value=<?= $numero ?> />
        <input type="hidden" name="acumulado" value=<?= $numeroAcumulado?>/>
        <input type="submit">
    </form>
    
    
</body>

</html>