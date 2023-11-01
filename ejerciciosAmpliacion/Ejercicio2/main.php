<!DOCTYPE html>
<?php
    $noEstaEntreLimites=$_POST["respetaLimites"]??0;
    if(isset($_POST["eleccionPersona"])){
        $intentos=0;
        $limiteInferior=$_POST["limiteInferior"];
        $limiteSuperior=$_POST["limiteSuperior"];
        $numeroAnteriorInferior=$_POST["AnteriorLimiteInferior"];
        $numeroAnteriorInferior=$_POST["AnteriorLimiteSuperior"];
        $numeroAnteriorSuperior=$limiteSuperior;
        $eleccionPersona=$_POST["eleccionPersona"];

        
        if($limiteInferior<$eleccionPersona && $limiteSuperior>$eleccionPersona){
            $noEstaEntreLimites=0;
            $numeroAleatorio=generateRandomNum($_POST["limiteInferior"],$_POST["limiteSuperior"]);
            if($numeroAnteriorInferior==$limiteInferior && $numeroAnteriorSuperior==$limiteSuperior){//si se cumple vuelve a intar a adivinar el mismo numero
                $numeroAleatorio=generateRandomNum($_POST["limiteInferior"],$_POST["limiteSuperior"]);
                if(adivinado($eleccionPersona,$numeroAleatorio)){
                    echo "aqui";
                }else{
                    
                }
            
            }else{
                echo "Se ha generado un nuevo numero entre los nuevos limites";
                $numeroAleatorio=generateRandomNum($_POST["limiteInferior"],$_POST["limiteSuperior"]);
                if(adivinado($eleccionPersona,$numeroAleatorio)){
                    
                }else{
                    
                }
            }
        }else{
            $noEstaEntreLimites=1;
        }


    }
    function generateRandomNum($limitMin,$limitMax){
        return random_int($limitMin,$limitMax);
    }
    function adivinado($numeroPesona,$numeroMaquina){
        return $numeroPesona==$numeroMaquina;
    }
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            flex:1;
            flex-wrap: wrap;
            width: 150px;
        }
    </style>
</head>
<body>
    <form action="main.php" method="POST">
        <label for="Limiteinferior">Limite inferior</label>
        <input id="Limiteinferior" type="number" name="limiteInferior"value="<?= $limiteInferior?>"required>
        <label for="LimiteSuperior">Limite Superior</label>
        <input id="LimiteSuperior" type="number" name="limiteSuperior"value="<?= $limiteSuperior?>"required>
        <label for="eleccion">La mejor profe del mundo</label>
        <input id="eleccion" type="number" name="eleccionPersona"value="<?= $eleccionPersona?>"required>
        <input type="number" hidden name="respetaLimites" value="<?=$noEstaEntreLimites?>">
        <input type="number" hidden name="AnteriorLimiteInferior" value="<?=$numeroAnteriorInferior??0?>">
        <input type="number" hidden name="AnteriorLimiteSuperior" value="<?=$numeroAnteriorSuperior??0?>">
        <button>intenta adivinar</button>
    </form>
    
    <?php
        if($noEstaEntreLimites){
            echo "El numero introducido no esta entre los limites";
        }
    ?>

</body>
</html>


