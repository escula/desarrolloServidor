
<?php
// Crear un cliente SOAP
if(isset($_GET['nombreAnimal'])){
    try {
        $cliente = new SoapClient(null, array(
            'location' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/ProtectoraSOAPyPOO/servidor.php',
            'uri' => 'http://localhost/desarrolloServidor/segundoTrimestre/SOAP/ProtectoraSOAPyPOO',
            
            
        ));
        $nombre=$_GET['nombreAnimal'];
        // Llamar al método saludar del servicio
        $resultado = $cliente->getBBDD($nombre);
        
        // Imprimir el resultado
        if($resultado){
            echo "el perro ".$nombre." existe";
        }else{
            echo "el perro ".$nombre." no existe";
        }
        
    } catch (Throwable $th) {
        echo $th->getMessage();
    }
}
?>
<form action="cliente.php" method="GET">
    <input type="text" name="nombreAnimal" id="" value=<?=$nombre??""?>>
    <button>Buscar Perro</button>
</form>