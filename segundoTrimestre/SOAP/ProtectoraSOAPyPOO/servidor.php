<?php
// Definir una clase con métodos que estarán disponibles en el servicio
include_once('accedeABBDD.php');
// Crear el servidor SOAP


$server = new SoapServer(null, array(
    'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/ProtectoraSOAPyPOO'));
$server->setClass('AccedeABBDD');

// Manejar la solicitud SOAP
$server->handle();


