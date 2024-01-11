<?php
$precio=array("cebolla"=>1,"lechuga"=>1,"puerro"=>3,"batatas"=>2,"zumoChristian"=>5);
$productos=[];

    if(session_status() ===PHP_SESSION_NONE){
        session_start();
    }
    if(count($_GET) >0 ){
        foreach ($_GET as $nombreProducto => $valor) {
            array_push($productos,$nombreProducto);
        }
        array_pop($productos);
        $productosJSON=json_encode($productos);
        $_SESSION['productos']=$productosJSON;
    }
    if(session_status()===PHP_SESSION_ACTIVE && isset($_GET['irACarrito'])){
        $precioTotal=0;

        foreach (json_decode($_SESSION['productos']) as $key => $nombresProductos) {
            foreach ($precio as $key => $precioProducto) {
                if ($nombresProductos===$key) {
                    $precioTotal=$precioTotal+$precioProducto;
                }
            }
        }

        echo  "precio total".$precioTotal;
    }
    if(session_status()===PHP_SESSION_ACTIVE && isset($_GET['cargar'])){
        include_once('elegirProductos.php');
        
    }
?>