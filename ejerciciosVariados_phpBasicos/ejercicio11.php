<?php
// metodos de string | cadenas
$cadena="Estamos dando nuestros primeros pasos en programación utilizando el lenguaje php";
echo "longitud cadena: ".strlen($cadena);
echo "</br>Primera ocurrecian de os: ".strripos($cadena, "os");
echo "</br>busca la palabra nuestros: ".str_contains($cadena,"nuestros");
echo "</br>La subcadena 'lenguaje php':".substr($cadena,-12,12);

echo "</br>La subcadena 'nuestros primeros pasos':".substr($cadena,strripos($cadena,"nuestros primeros pasos"),strlen('nuestros primeros pasos'));

echo "</br>El reemplazo de las palabras estamos por estoy y nuestros por mis.: ".$cadena;
$cadena=str_replace("Estamos","Estoy",$cadena);
$cadena=str_replace("nuestros","mis",$cadena);

echo "</br>Todas las letras de la cadena en minúsculas: ";
echo $cadena=strtolower($cadena);
echo "</br>Todas las letras de la cadena en mayuscula: ";
echo strtoupper($cadena);

echo "</br>La frase con todas las letras iniciales de cada palabra en mayúscula.";
echo $cadena=ucwords($cadena);
?>