<?php
$parametrosRecibidosPorBody = json_decode(file_get_contents('php://input'), true);
//php://input-> devuelve cualquier dato de body sin procesar (string)
//true convierte el json en una array asociativo

$nombre=$parametrosRecibidosPorBody['nombre'];
$edad=$parametrosRecibidosPorBody['edad'];
$resultado=["respuestaServidor"=>"tu nombre es: ".$nombre." y tienes ".$edad];


echo json_encode($resultado);

//En lugar de echo puedes poner print_r(json_encode($resultado));
?>

