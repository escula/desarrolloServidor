<?php
// Crear un cliente SOAP
$cliente = new SoapClient(null, array(
    'location' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/SOAPyPOO/sevidor.php',
    'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/SOAPyPOO',
    
    
));

// Llamar al método saludar del servicio
$resultado = $cliente->getBBDD('mengano');

// Imprimir el resultado
echo $resultado;