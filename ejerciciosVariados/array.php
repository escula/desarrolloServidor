<?php
    $array=[];
    $array1=["lama","paca","fraca",2134];
    echo($array1[0]);

    //Array Asociativo
    $arrayAsociativo=array("España"=>"Madrid",
                    "Suiza"=>"Luxemburgo",
                "Francia"=>"París");
    echo($arrayAsociativo["Suiza"]);

    foreach($arrayAsociativo as $clave => $valor){
        echo "<p>claves: " . $clave . "Valor: " . $valor."</p>";
    }

    foreach($array1 as $valores){
        echo $valores;
    }
    $arrayDosDimensiones=[[21321,31312,423423],[43,4343,4343],[4343,432432,4343]];
    echo $arrayDosDimensiones[1][0];
    echo "</br>";
    foreach($arrayDosDimensiones as $numbers){
        foreach($numbers as $number){
            echo "<p>".$number."</p>";
        }

        
    }

    $arrayDosDimensiones= array("España"=> array("1"=>"madrid",
                                                "2"=>"Salamanca",
                                                "3"=>"Huesca"),
                                "Francia" => array("4"=>"mompelie",
                                                "5"=>"paris"));

    echo "<table>";
    foreach($arrayDosDimensiones as $country => $value){
        echo "<tr>";
        echo "<td>".$country."</td>";
        foreach($value as $claveProvincia => $valorProvincincia){
            echo "<td>".$valorProvincincia."</td>";
        }   
        echo "</tr>";
        
    }
    echo "</table>";


    $listado2 =array("Junior"=> array(
                                "Nombre"=>array("Jesús","Pepe"),
                                    "DNI"=>array("1111","2222")),
                    "senior"=>array(
                                "Nombre"=>array("Mamen","Pepi"),
                                "DNI"=>array("333","444")));

    foreach($listado2 as $key => $level){
        echo $key;
        echo "<ul>";
        foreach($level["Nombre"] as $key => $personProperties){
            echo "<li>".$personProperties."</li>";
        }
        echo "</ul>";
    }
    
?>