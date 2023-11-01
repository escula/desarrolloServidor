<?php
function dividir($numero1,$numero2){
    if($numero2!=0){
        echo "<p>Division: ".$numero1." / ".$numero2 ." = ".$numero1/$numero2."</p>";
    }else{
        echo "No se puede dividir";
    }

}
function modulo($numero1,$numero2){
    if($numero2!=0){
        echo "<p>Modulo: ".$numero1." % ".$numero2 ." = ".$numero1%$numero2."</p>";
    }else{
        echo "No se obtener modulo";
    }
            
}

?>