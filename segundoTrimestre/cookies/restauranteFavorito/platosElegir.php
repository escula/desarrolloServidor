
<?php
$serverName = "localhost:3306";
$username = "root";
$password = "";
$nombreBBDD = "restaurante";
$contraseña = "1234";
//Se inicia la sesión si no esta iniciada
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(isset($_GET["salirCuenta"])){
    session_unset();
}

if ( isset($_SESSION['usuario'])) {
//se cierra la cuenta de la mesa y genera la cookie que guarda los platos que tiene 1 o más peidos.
if(isset($_GET["cerrarCuenta"])){

    $platosElegidoPorCliente=json_decode($_COOKIE['Platos']);
    eliminarPlatosPorPedidos(0, $platosElegidoPorCliente);

    setcookie("PlatosElegidosPorCliente",json_encode($platosElegidoPorCliente), time()+300000,"/");
    header('Location: resumenCuenta.php');
    exit();
}
//cuando se cierra la sesión
//Cuando se pulsa en sumar un alimento especifico
if(isset($_GET["sumarAlimento"])){
    sumarPlato($_GET["sumarAlimento"]);
}
//Cuando se pulsa en restar un alimento especifico
if(isset($_GET["restarAlimento"])){
    restarPlato($_GET["restarAlimento"]);
}
// generador de banner
if(isset($_COOKIE['cantidadPlatosTotal']) && isset($_SESSION['usuario'])){
    $platosMasVendidos=obtenerTresPlatosMasPedidos();
    echo '
    <div style="position:absolute; height:100dvh;top:0px; right:0px; background:red">';
    foreach ($platosMasVendidos as $plato) {
        foreach ($plato as $nombrePlato => $numeroDeVentas) {
            echo '<p>'.$nombrePlato.': '.$numeroDeVentas.'</p>';
        }
    }
    
echo '</div>';
    
}

    //genera la interfaz principal

    $conn = new PDO("mysql:host=$serverName;dbname=" . $nombreBBDD . ";charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<style>
    
        input{
            display:inline-block
        }
    </style>
    <form action="platosElegir.php" method="GET">
    ';
    $prepareStatement = $conn->prepare('SELECT * FROM Platos');
    $prepareStatement->execute();
    $resultadoConsulta = $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
    //Inicia cookie cuado no se recibe ningun boton de añadir y quitar que es cuando se viene del login
    if(!(isset($_GET['sumarAlimento']) || isset($_GET['restarAlimento']))){
        iniciarCookie($resultadoConsulta);
        
    }
    
    foreach ($resultadoConsulta as $fila) {
        $nombreAlimento = $fila['nombre'];
        $precioAlimento = $fila['precio'];
        $categoriaALimento = $fila['categoria'];
        echo '<label for="' . $nombreAlimento . '">' . $nombreAlimento . '</label>
       <p style="display:inline">'.getNumeroPlato($nombreAlimento).'</p>     
       <p style="display:inline"> '.$precioAlimento.'€</p>  
       <button name="sumarAlimento" value="' . $nombreAlimento . '">Añadir</button>
       <button name="restarAlimento" value="' . $nombreAlimento . '">Quitar</button>
       <p>' . $categoriaALimento . '</p>
       </br>';

    }
    echo '<button name="cerrarCuenta">Cerrar Cuenta</button>
    <button name="salirCuenta" >CerrarSesion</button>';
    echo '</form>';
} else {
    include_once 'migrations/creacionInicial.php';
    include_once 'seeds/valoresIniciales.php';
    echo '<a href="login.php">Inicie sesion</a>';
}

//Fuccion que inicializa la cookie con los valores pasados por parametro, usada para imprimir todos los platos y su cantidad
function iniciarCookie($platosEnBBDD)
{
    $valorCookie = [];
    foreach ($platosEnBBDD as $plato) {
        array_push($valorCookie, array($plato['nombre'] => 0));

    }
    $resultado = json_encode($valorCookie);
    $_COOKIE['Platos'] = $resultado;
    setcookie('Platos', $resultado, time() + 300000, '/');
}
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

            if ($nombrePlato == $nombrePlatoARestar && $numeroDePlato!=0) {
                $numeroDePlato = $numeroDePlato - 1;
                $encontrado = true;
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

function obtenerTresPlatosMasPedidos(){
    $platosTotalConsumidos=json_decode($_COOKIE['cantidadPlatosTotal']);
    $mayorNumero=0;
    $resultado=[];

    ordenarArrayPorPedidos($platosTotalConsumidos);
    for ($i=0; $i < 3; $i++) { 
        array_push($resultado,$platosTotalConsumidos[$i]);
    }
    return $resultado;

}

//Ordena de mayor a menor todos los platos por el numero de pedidos

function ordenarArrayPorPedidos(&$arrayCookieAOrdenar): bool{
    function compararValores($a, $b) {
        $numeroPlatosA=array_values(get_object_vars($a))[0]; //obteniendo cantidad de a
        $numeroPlatosB=array_values(get_object_vars($b))[0];//obteneindo cantidad de b
        
        return $numeroPlatosB - $numeroPlatosA;
    }
    
    // Ordenar el array
    return usort($arrayCookieAOrdenar, 'compararValores');
}
function eliminarPlatosPorPedidos($numeroPedidos, &$arrayModificar){
    $numeroDeVeces=count($arrayModificar);

    for ($i = 0; $i < $numeroDeVeces; $i++) {

        foreach ($arrayModificar[$i] as $nombrePlato=> $numeroDePlato) {
      

            if ($numeroPedidos == $numeroDePlato) {
    
                unset($arrayModificar[$i]);
            }
        }
    }
    $arrayModificar=array_values($arrayModificar);//reorganiza los indices del array
}

