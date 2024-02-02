<?php
// Crear un cliente SOAP
$cliente = new SoapClient(null, array(
    'location' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/SOAPbasico/sevidor.php',
    'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/SOAPbasico',
    
    
));

// Llamar al método saludar del servicio
$resultado = $cliente->saludar('mengano');

// Imprimir el resultado
echo $resultado;