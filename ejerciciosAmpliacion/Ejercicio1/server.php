<?php

$numerosYletras=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];

if(isset($_POST["dnionie"])){
    $tamanoDocumentacion=strlen($_POST["dnionie"]);
    $letraDelFormulario=substr($_POST["dnionie"],$tamanoDocumentacion-1,1);
    $contieneLetraAdecuada=comprobarLetraDNI($numerosYletras,$letraDelFormulario);

    if(queDocumentacionEs($_POST["dnionie"])==="dni"){//Comprobando si es un dni y si se ha introducido la letra correcta
        if(esCorrectaLaLetraIntroducidaDelDNI($numerosYletras,$_POST["dnionie"],$letraDelFormulario)){
            echo "El dni esta bien introducido";
        }

    }else if(queDocumentacionEs($_POST["dnionie"])==="nie"){//Comprobando si es NIE y si se ha introducido la letra correcta
        

    }else{
        echo "mal introducido introduzca 8 numeros + 1 letras o 7 numeros + 1 letra";
    }
}
function comprobarLetraDNI(&$numerosLetras,$letraUsada){
    $resultado=false;
    foreach ($numerosLetras as $value) {
        if($letraUsada==$value){
            $resultado=true;
        }
    }
    return $resultado;
}

function esCorrectaLaLetraIntroducidaDelDNI(&$numerosLetras,$dniIntroducido,$letraDNIIntroducido){
    $numeros=intval(substr($dniIntroducido,0,strlen($dniIntroducido)-1));
    $modulo=$numeros%23;
    
    if($letraDNIIntroducido===$numerosLetras[$modulo]){
        return true;
    }else{
        return false;
    }
}
function queDocumentacionEs($dniOnie){
    
    if(preg_match("/^([0-9]{8})+[A-Z]{1}$/",$dniOnie)){
        return "dni";
    }else if(preg_match("/^([0-9]{7})+[A-Z]{1}$/",$dniOnie)){
        return "nie";
    }else{
        return "mal";
    }
}
?>