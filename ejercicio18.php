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
        
        
        function calcularPares(){
            global $cadena;
            $cadena='<form action="ejercicio18.php" method="get"><input type="number" name="numeroAleatorio"value="0"/><input type="submit"></form>';
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
                //echo preg_replace('/value="'.$NumeroAnterior.'/"','/value="'.$NumeroAnterior.'/"',$cadena);
                
                echo "numero total".$sumaTotal;
            
            }
           
        }
        calcularPares();
    ?>
</body>
</html>
