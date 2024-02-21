<?php
if(isset($_GET['fecha'])){

    // Crear un cliente SOAP
    $cliente = new SoapClient(null, array(
        'location' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/personaMayorSOAP/sevidor.php',
        'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/personaMayorSOAP',
    ));

    // Llamar al método saludar del servicio
    $resultado = $cliente->esMayorEdad($_GET['fecha']);
    if($resultado){
       echo  "es mayor de edad";
    }else{
        echo "es menor de edad";
    }
}

?>
<form action="" method="get">
    <label for="">Elija su cumple:</label>
    <input type="date" name="fecha">

    <button type="submit">Enviar</button>
</form>
