<?php
// Definir una clase con métodos que estarán disponibles en el servicio
class MiServicio {
    public function saludar($nombre) {
        return "¡Hola, $nombre!";
    }
}

// Crear el servidor SOAP
$server = new SoapServer(null, array(
    'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP'));
$server->setClass('MiServicio');

// Manejar la solicitud SOAP
$server->handle();