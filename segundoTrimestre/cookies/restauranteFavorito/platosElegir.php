<?php
include_once("BBDD.php");
//Se inicia la sesión si no esta iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['usuario'])) {

    // generador de banner
    if (isset($_COOKIE['cantidadPlatosTotal']) && isset($_SESSION['usuario'])) {
        $platosMasVendidos = obtenerTresPlatosMasPedidos();
        echo '
    <div style="position:absolute; height:100dvh;top:0px; right:0px; background:red">';
        foreach ($platosMasVendidos as $plato) {
            foreach ($plato as $nombrePlato => $numeroDeVentas) {
                echo '<p>' . $nombrePlato . ': ' . $numeroDeVentas . '</p>';
            }
        }

        echo '</div>';

    }

    //genera la interfaz principal
    $bd = new BBDD();
    $resultadoConsulta = $bd->obtenerTodosLosPlatos();


    echo '<style>
    
        input{
            display:inline-block
        }
    </style>
    <form action="controlerPlatosElegir.php" method="GET">
    ';



    foreach ($resultadoConsulta as $fila) {
        $nombreAlimento = $fila['nombre'];
        $precioAlimento = $fila['precio'];
        $categoriaALimento = $fila['categoria'];
        echo '<label for="' . $nombreAlimento . '">' . $nombreAlimento . '</label>
       <p style="display:inline">' . getNumeroPlato($nombreAlimento) . '</p>     
       <p style="display:inline"> ' . $precioAlimento . '€</p>  
       <button name="sumarAlimento" value="' . $nombreAlimento . '">Añadir</button>
       <button name="restarAlimento" value="' . $nombreAlimento . '">Quitar</button>
       <p>' . $categoriaALimento . '</p>
       </br>';

    }
    echo '<button name="cerrarCuenta">Cerrar Cuenta</button>
    <button name="salirCuenta" >CerrarSesion</button>';
    echo '</form>';
    $cantidadTotal = isset($_COOKIE['sumaTotal']) ? $_COOKIE['sumaTotal'] : 0;
    echo '<p>Total:' . $cantidadTotal . ' €</p>';
} else {
    include_once 'migrations/creacionInicial.php';
    include_once 'seeds/valoresIniciales.php';
    echo '<a href="login.php">Inicie sesion</a>';
}




//Se usa para obtener las numero de veces que se pide un plato
function getNumeroPlato($nombrePlatoImprimir)
{
    $platosCookie = json_decode($_COOKIE['Platos']);
    for ($i = 0; $i < count($platosCookie); $i++) {
        foreach ($platosCookie[$i] as $nombrePlato => $numeroDePlato) {
            if ($nombrePlato == $nombrePlatoImprimir) {
                return $numeroDePlato;
            }
        }
    }
    return 0;
}

function obtenerTresPlatosMasPedidos()
{
    $platosTotalConsumidos = json_decode($_COOKIE['cantidadPlatosTotal']);
    $mayorNumero = 0;
    $resultado = [];
    //para no generar arrays con indicees vacios
    if (count($platosTotalConsumidos) > 3) {
        $indiceBlucle = 3;
    } else {
        $indiceBlucle = count($platosTotalConsumidos);
    }
    ordenarArrayPorPedidos($platosTotalConsumidos);
    for ($i = 0; $i < $indiceBlucle; $i++) {
        array_push($resultado, $platosTotalConsumidos[$i]);
    }
    return $resultado;

}

//Ordena de mayor a menor todos los platos por el numero de pedidos

function ordenarArrayPorPedidos(&$arrayCookieAOrdenar): bool
{
    function compararValores($a, $b)
    {
        $numeroPlatosA = array_values(get_object_vars($a))[0]; //obteniendo cantidad de a
        $numeroPlatosB = array_values(get_object_vars($b))[0]; //obteneindo cantidad de b

        return $numeroPlatosB - $numeroPlatosA;
    }

    // Ordenar el array
    return usort($arrayCookieAOrdenar, 'compararValores');
}