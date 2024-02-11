<?php
$serverName = "localhost:3306";
$username = "root";
$password = "";
$nombreBBDD = "restaurante";

session_start();
if (isset($_SESSION['usuario'])) {

    //cuando pulsa en generar una nueva cuenta
    if (isset($_GET['resetear'])) {
        // generada la cookie que almacena a modo de contador todos los pedido si no esta creada
        if (!isset($_COOKIE['cantidadPlatosTotal'])) {
            // $valoresIniciales='[{"carne":0},{"lentejas":0},{"aire":0},{"pan":0},{"lechuguita":0},{"Wasabi":0},{"Anchoa":0},{"Pasta":0},{"Plastico":0},{"Caramelo":0}]';
            $valoresIniciales = '[]';
            setcookie('cantidadPlatosTotal', $valoresIniciales, time() + 1000000, '/');
            $_COOKIE['cantidadPlatosTotal'] = '[]';

        }

        //Se suma los platos de la cuenta actual con el contador general
        $platosCuentaActual = json_decode($_COOKIE['Platos']);
        for ($i = 0; $i < count($platosCuentaActual); $i++) {
            foreach ($platosCuentaActual[$i] as $nombrePlato => $valorPorPlato) {
                sumarNumeroAPlato($nombrePlato, $valorPorPlato);
            }
        }

        //envia a la pagna principal alli se mostraran el banner
        header('Location: controlerPlatosElegir.php?VengoDeResumenCuenta=');

    }

    //cuando recibe los platos, e imprime el resultado
    if (isset($_COOKIE['Platos'])) {
        $platosCookies = json_decode($_COOKIE['Platos']);
        for ($i = 0; $i < count($platosCookies); $i++) {
            foreach ($platosCookies[$i] as $nombrePlato => $value) {
                echo '<p>' . $nombrePlato . ': ' . $value . '</p>';
            }
        }
        $cantidadTotal = isset($_COOKIE['sumaTotal']) ? $_COOKIE['sumaTotal'] : 0;
        echo '<p>Total:' . $cantidadTotal . ' €</p>';
        echo '<form action="resumenCuenta.php" method="GET"><button name="resetear" >iniciar nueva cuenta</button></form>';
        echo '<p style="color:red">No he visto reflejado en ninguna parte que campos había que poner en esta página por lo que se ha incluido el nombre plato, la cantidad, y el precio total</p>';
    } else {
        echo '<h1><a href="login.php">Usted no tendria que estar aquí</a></h1>';

    }

} else {
    echo '<a href="login.php">No no no tú no puedes estar aquí</a>';
}

//$nombrePlatoAincrementar es el palto que se quiere incrementar
//Cantidad es lo la cantidad que se quiere sumar al plato
function sumarNumeroAPlato($nombrePlatoAincrementar, $cantidad)
{
    $encontrado = false;
    $platosCookie = json_decode($_COOKIE['cantidadPlatosTotal']);
    for ($i = 0; $i < count($platosCookie); $i++) {
        foreach ($platosCookie[$i] as $nombrePlato => &$numeroDePlato) {

            if ($nombrePlato == $nombrePlatoAincrementar) {
                $numeroDePlato = $numeroDePlato + $cantidad;
                $encontrado = true;
            }
        }
    }
    //si no lo ha encontrado significa que nunca ha estado antes en la lista por lo que se debe añadir
    if (!$encontrado) {
        array_push($platosCookie, array($nombrePlatoAincrementar => $cantidad));
    }

    $resultado = json_encode($platosCookie);
    $_COOKIE['cantidadPlatosTotal'] = $resultado;
    setcookie('cantidadPlatosTotal', $resultado, time() + 300000, '/');

}
