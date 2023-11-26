<?php 
  $numero=-22;
  if($numero>0 && is_integer($numero)){
    if($numero%2==0){
      echo "El numero ".$numero." es par";
    }else{
      echo "El numero ".$numero." es impar";
    }
  }else{
    echo "el número no es positivo ni entero";
  }
?>