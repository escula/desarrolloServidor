<?php
// Definir una clase con métodos que estarán disponibles en el servicio
include_once('calcularSiEsMayor.php');
// Crear el servidor SOAP
$server = new SoapServer(null, array(
    'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/personaMayorSOAP'));
$server->setClass('Calculador');

// Manejar la solicitud SOAP
$server->handle();