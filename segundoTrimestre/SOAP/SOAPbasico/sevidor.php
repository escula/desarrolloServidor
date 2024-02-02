<?php
// Definir una clase con métodos que estarán disponibles en el servicio
include_once('clase.php');
// Crear el servidor SOAP
$server = new SoapServer(null, array(
    'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/SOAPbasico/'));
$server->setClass('MiServicio');

// Manejar la solicitud SOAP
$server->handle();