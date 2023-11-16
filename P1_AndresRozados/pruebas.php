<?php
    include './model/BBDD.php';
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
    $resultado=$conexion->eliminarFila('cliente','CLIENTE_ID',101);
    echo $resultado;
?>
<script>
        function cacatua(baseDatos){
            console.log(baseDatos);
            
        }
</script>