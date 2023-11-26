<?php

$numerosYletras=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
$operacionesExtrasNIE=["X","Y","Z"];


if(isset($_POST["dnionie"])){
    $tamanoDocumentacion=strlen($_POST["dnionie"]);
    $letraDelFormulario=substr($_POST["dnionie"],$tamanoDocumentacion-1,1);    

    echo esCorrectaLetraDocumentacion($numerosYletras,$operacionesExtrasNIE,$_POST["dnionie"],queDocumentacionEs($_POST["dnionie"]));   
}

function esCorrectaLetraDocumentacion(&$letrasPermitidas,&$operacionesExtrasNIE,$dniIntroducido,$tipoDocumentacion="DNI"){
    $numeros=intval(substr($dniIntroducido,0,strlen($dniIntroducido)-1));
    $modulo=$numeros%23;
    $letraIntroducida=substr($dniIntroducido,strlen($dniIntroducido)-1,1);
    $resultado="mal introducido introduzca 8 numeros + 1 letras o 7 numeros + 1 letra";

    if($tipoDocumentacion==="DNI"){
        if($letraIntroducida===$letrasPermitidas[$modulo]){
            $resultado= "dni perfecto ._.";
        }else{
            $resultado= "dni mal introducido: Tus numeros no corresponden con la letra o has introducido una letra no permitida";
        }

    }else if($tipoDocumentacion==="NIE"){
        
        if($letraIntroducida===$letrasPermitidas[$modulo]){
            
            //interpreto que con letra inicial te refires al primer nuemero y que por lo tanto a parte de 
            // respetar la norma del modulo tambien debe respetar la norma de que cuando sea X el primer numero debe ser 0
            
            if(seRequiereOperacionExtra($dniIntroducido,$operacionesExtrasNIE)){//Te comprueba si la letra e¡introducida es X,Y o Z 
                if(esCorrectoElPrimerNumeroYLetraNIE($dniIntroducido,$operacionesExtrasNIE)){//realizando la operacion extra
                    $resultado= "El NIE esta perfecto ლ(o◡oლ)";
                }else{
                    $resultado= "NIE: te falla o el primer numero o la ultima letra";//Ocurre cuando no respetas la norma de X con primer numero del NIE en 0, Y con primer numero  NIE en 1,ect
                }
            }else{
                $resultado= "El NIE esta perfecto ._.";
            }
        }else{
            $resultado= "Nie mal introducido: Tus numeros no corresponden con la letra o has introducido una letra no permitida";//Esto ocurre cuando se no se ha generado el modulo adecuado
        }
    }
    return $resultado;
}

//Te comprueba si la letra introducida es X,Y o Z
function seRequiereOperacionExtra($dniIntroducido,&$arrayOperacionesExtras){
    $letraIntroducida=substr($dniIntroducido,strlen($dniIntroducido)-1,1);//Vuelvo a realizar la misma operacion que en esCorrectaLetraDocumentacion, apesar de que se lo posdria pasar por paramentro, pero creo que visualmente si se repite queda más claro el codigo
    foreach ($arrayOperacionesExtras as $numerovalido => $letraValida) {
        if($letraIntroducida===$letraValida){
            return true;
        }
    }
    return false;
}

function esCorrectoElPrimerNumeroYLetraNIE($dniIntroducido,&$arrayOperacionesExtras){
    $primerNumero=intval(substr($dniIntroducido,0,1));
    $letraIntroducida=substr($dniIntroducido,strlen($dniIntroducido)-1,1);//Vuelvo a realizar la misma operacion que en esCorrectaLetraDocumentacion, apesar de que se lo posdria pasar por paramentro, pero creo que visualmente si se repite queda más claro el codigo

    foreach ($arrayOperacionesExtras as $numerovalido => $letraValida) {
        if($numerovalido===$primerNumero && $letraIntroducida===$letraValida){
            return true;
        }
    }
    return false;

}
function queDocumentacionEs($dniOnie){
    if(preg_match("/^([0-9]{8})+[A-Z]{1}$/",$dniOnie)){
        return "DNI";
    }else if(preg_match("/^([0-9]{7})+[A-Z]{1}$/",$dniOnie)){

        return "NIE";
    }else{

        return "mal";
    }
}

/*****************************************
 * **********Funcion de testeo************
 * ***************************************/


//Funcion que se usa para el testeo
//Devuelve el numero con el que haciendo el modulo de 23 obtienes el indice del array definido como :"numerosYletras".
//NOta: no te añade la letra esta se la tiene que añadir tu manualmente, solo genera los numeros.
//
//Primer parametro -> Indice que se quiere que corresponde con el array definido como numerosYletras
//Segundo parametro -> El primer numero que quieres que tenga la documentacion, si es 0 vale cualquier cifra
//Tercero es el-> El numero de cifras que quieres que tenga el documento Ej: 2|4|5|6. Si es 0 vale cualquier cifra
//Limite de busqueda es el numero de iteraciones que se realizaran para buscar el numero
if(isset($_GET["indiceLetra"])){//GET porque me interesa ver los datos que se le psasa al servidor
    $indiceLetra=intval($_GET["indiceLetra"]);
    $primNumero=intval($_GET["primerDigito"]);
    $numCifra=intval($_GET["numerodeCifras"]);
    echo obtenerNuemeroDNIParaPruebas($indiceLetra,$primNumero,$numCifra)."</br>";
}
function obtenerNuemeroDNIParaPruebas($IndiceletraQueSeQuiereObtener,$primerNumero=0,$numeroDeCifras=0,$limiteDeBusqueda=99999999999999999999999){

    for ($cociente=0; $cociente <$limiteDeBusqueda; $cociente++) { 
        
        $dividendo=23*$cociente+$IndiceletraQueSeQuiereObtener;//funcion pricicpal para calcular el dividendo=numero de dni
        
        //Distintos condiciones segun los parametros que se intrudicen hay 4 porque hay 4 probabilidades
        if ($primerNumero===0 && $numeroDeCifras===0){
            return $dividendo;
        }else if($primerNumero===intval(substr(strval($dividendo),0,1)) && $numeroDeCifras===0){
            
            return $dividendo;
        }else if ($primerNumero===0 && $numeroDeCifras===strlen(strval($dividendo))){
            
            return $dividendo;
        }else if ($primerNumero===intval(substr(strval($dividendo),0,1)) && $numeroDeCifras===strlen(strval($dividendo))){
            return $dividendo;
        }
    }
    return "no se ha encontrado ningun numero";
      
}

?>