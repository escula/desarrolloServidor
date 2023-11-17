<?php
    include './model/BBDD.php';
    include_once './constants/erroresSQL.php';
    $conexion=new BBDD();
    $hola=$conexion->selectNombreTablas();//Devuelve un array
    print_r($hola);
    echo "<ul>";
    foreach ($hola as $key=>$value) {
        echo $value['nombre'];
       
    }
    $baseDatos=array("esto es"=>2,"loco"=>"fsduifboeui");
    $json=json_encode($baseDatos);
    echo "</br>";
    print_r($json);

    echo "<button onclick='cacatua($json)'>boton</button>";
    $palabra="PP";
    $palabra.="+PSO";
    $palabra.="Junts";
    echo $palabra;
    try{
        $resultado=$conexion->eliminarFila('cliente','CLIENTE_ID',207);
        // $resultado=$conexion->eliminarFila('trabajos','Trabajo_ID',667);
        $mensajeParaVista=json_encode(array("tipoModal"=>"modalError","mensajePopUp"=>"fufa"));

    }catch(Exception $excepcion){
        echo(preg_match("/\\[(.*?)\\]/i", $excepcion, $numeroDeError));
        $mensajeError=$erroresSQL[$numeroDeError[1]];
        $mensajeParaVista=json_encode(array("tipoModal"=>"modalError","mensajePopUp"=>$mensajeError));
        
    }finally{
        echo $mensajeParaVista;
    }
    
    


    // echo $resultado;

?>
<script>
        function cacatua(baseDatos){
            console.log(baseDatos);
            
        }
</script>