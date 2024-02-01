<?php
// Crear un cliente SOAP
$cliente = new SoapClient(null, array('location' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/', 
'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/sevidor.php'));

// Llamar al método saludar del servicio
$resultado = $cliente->saludar('Juan');

// Imprimir el resultado
echo $resultado;