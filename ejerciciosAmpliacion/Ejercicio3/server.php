<?php
    $conversor=["tijera","roca","papel"];
    
    $numeroDepartidas=0;
    $rondasGanaMaquina=0;
    $rondasGanaPersona=0;

    $eleccionMaquina=$conversor[random_int(0,2)];
    $eleccionPersona="";

    
    if(isset($_POST["eleccionPersona"])){
        $eleccionPersona=$_POST["piedra"];
        if($eleccionMaquina=="papel"&& $eleccionPersona=="tijera"){
            echo "gana persona: ".$conversionAPalabra[$rondasGanaMaquina+1];
            $rondasGanaPersona=$rondasGanaPersona+1;
        }else if($eleccionMaquina=="tijera"&& $eleccionPersona=="papel"){
            echo "Ha ganado maquina con ".$conversionAPalabra[$rondasGanaMaquina+1];
            $rondasGanaMaquina=$rondasGanaMaquina+1;

        }else if($eleccionMaquina=== $eleccionPersona){
            echo "Empate: ".$conversionAPalabra[$rondasGanaMaquina+1];
            $numeroDepartidas=$numeroDepartidas+1;

        }else if($eleccionMaquina=="tijera" && $eleccionPersona=="roca"){
            echo "gana persona: ".$conversionAPalabra[$rondasGanaMaquina+1];
            $rondasGanaPersona=$rondasGanaPersona+1;

        }else if($eleccionMaquina=="roca"&& $eleccionPersona=="tijera"){
            echo "Ha ganado maquina con : ".$conversionAPalabra[$rondasGanaMaquina+1];
            $rondasGanaMaquina=$rondasGanaMaquina+1;

        }else if($eleccionMaquina=="papel" && $eleccionPersona=="roca"){
            echo "Ha ganado maquina con ".$conversionAPalabra[$rondasGanaMaquina+1];
            $rondasGanaMaquina=$rondasGanaMaquina+1;

        }else if($eleccionMaquina=="roca"&& $eleccionPersona=="papel"){
            echo "gana persona: ".$conversionAPalabra[$rondasGanaMaquina+1];
            $rondasGanaPersona=$rondasGanaPersona+1;

        }
    }
    function imprimirResultado($rondaswinPersona){
        echo "<p>Ganado persona:$rondaswinPersona</p>";

    }

?>