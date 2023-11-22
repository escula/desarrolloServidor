<!-- . Busca cuatro imágenes en internet. Crea una página que muestre de forma aleatoria
una de ellas. -->
<?php
$nombreFichero=["a","b","c","d"];

$nombreAleatorio=$nombreFichero[random_int(0,count($nombreFichero)-1)];

echo'<img src="'.$nombreAleatorio.'.jpg">'

?>
