<?php
include_once('BBDD.php');
//cuando se cierra la sesión

session_start();
if(isset($_GET["salirCuenta"])){
    session_unset();
}

//se cierra la cuenta de la mesa y genera la cookie que guarda los platos que tiene 1 o más peidos.
if(isset($_GET["cerrarCuenta"])){

    // $platosElegidoPorCliente=json_decode($_COOKIE['Platos']);
    // eliminarPlatosPorPedidos(0, $platosElegidoPorCliente);

    // setcookie("PlatosElegidosPorCliente",json_encode($platosElegidoPorCliente), time()+300000,"/");
    header('Location: resumenCuenta.php');
    exit();
}

//Cuando se pulsa en sumar un alimento especifico
if(isset($_GET["sumarAlimento"])){
    sumarPlato($_GET["sumarAlimento"]);
    sumarTodosLosPlatos();
}
//Cuando se pulsa en restar un alimento especifico
if(isset($_GET["restarAlimento"])){
    restarPlato($_GET["restarAlimento"]);
    sumarTodosLosPlatos();
}
//Inicia cookie cuado no se recibe ningun boton de añadir y quitar que es cuando se viene del login
if(isset($_GET['VengoDeResumenCuenta']) || isset($_GET['VengoDeLogin']) ){
    iniciarCookie();
    
}


header('Location: platosElegir.php');

//Se ejecuta cUANDO SUMAS UN PLATO
function sumarPlato($nombrePlatoAincrementar)
{
    $encontrado = false;
    $platosCookie = json_decode($_COOKIE['Platos']);
    for ($i = 0; $i < count($platosCookie); $i++) {
        foreach ($platosCookie[$i] as $nombrePlato => &$numeroDePlato) {

            if ($nombrePlato == $nombrePlatoAincrementar) {
                $numeroDePlato = $numeroDePlato + 1;
                $encontrado = true;
            }
        }
        if ($encontrado) {
            break;
        }
    }
    //Si no ha encontrdo el plato que se buscaba significa que no existe en la cookie por lo que se crea
    if(!$encontrado){
        array_push($platosCookie, array($nombrePlatoAincrementar => 1));
    }
    $resultado = json_encode($platosCookie);
    $_COOKIE['Platos'] = $resultado;
    setcookie('Platos', $resultado, time() + 300000, '/');

}
//se ejecuta cuando restas un plato
function restarPlato($nombrePlatoARestar)
{
    $encontrado = false;
    $platosCookie = json_decode($_COOKIE['Platos']);
    for ($i = 0; $i < count($platosCookie); $i++) {
        foreach ($platosCookie[$i] as $nombrePlato => &$numeroDePlato) {

            if ($nombrePlato == $nombrePlatoARestar) {
                if( $numeroDePlato>1){
                    $numeroDePlato = $numeroDePlato - 1;
                    $encontrado = true;
                }else{
                    unset($platosCookie[$i]);
                    $platosCookie=array_values($platosCookie);//reorganiza los indices del array
                }
            }
        }
        if ($encontrado) {
            break;
        }
    }

    $resultado = json_encode($platosCookie);
    $productosJson = $resultado;
    $_COOKIE['Platos'] = $resultado;
    setcookie('Platos', $productosJson, time() + 300000, '/');
}
//Fuccion que inicializa la cookie con los valores pasados por parametro, usada para imprimir todos los platos y su cantidad
function iniciarCookie()
{
    $valorCookie = [];
    $resultado = json_encode($valorCookie);
    setcookie('Platos', $resultado, time() + 300000, '/');
}

function sumarTodosLosPlatos(){
    $bd=new BBDD();
    
    $platosYprecios=$bd->obtenerPlatoPrecio();
    $platosSeleccionados=json_decode($_COOKIE['Platos']);
    $sumatorio=0;

    for ($i=0; $i < count($platosSeleccionados); $i++) { 
        foreach ($platosSeleccionados[$i] as $nombrePlato => $vecesPedido) {
            $costePlato=recuperarPrecioDeUnNombre($platosYprecios,$nombrePlato);
            $sumatorio=$sumatorio+($costePlato*$vecesPedido);
        }
    }
    setcookie('sumaTotal',strval($sumatorio), time() + 300000, '/');
}
function recuperarPrecioDeUnNombre($arrayConNombreYPrecio,$nombreProducto){
    foreach ($arrayConNombreYPrecio as  $value) {
        if($value['nombre'] === $nombreProducto){
       
            return $value['precio']; 
        }

    }
}