<?php
$precio=array("cebolla"=>1,"lechuga"=>1,"puerro"=>3,"batatas"=>2,"zumoChristian"=>5);
$productos=[];

    if(session_status() ===PHP_SESSION_NONE){
        session_start();
    }

    if(session_status()===PHP_SESSION_ACTIVE){
        $precioTotal=0;

        foreach ($_SESSION['productos'] as $nombresProductos => $precio) {
                $precioTotal=$precio+$precioTotal;
        }

        echo  "precio total: ".$precioTotal;
    }
?>