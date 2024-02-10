<?php
$serverName = "localhost:3306";
$username = "root";
$password = "";
$nombreBBDD = "restaurante";
$contraseña = "1234";
if(isset($_GET["cerrarCuenta"])){
    header('Location: resumenCuenta.php');
}
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(isset($_GET["salirCuenta"])){
    salirDeCuenta();
}
if(isset($_GET["sumarAlimento"])){
    sumarPlato($_GET["sumarAlimento"]);
}
if(isset($_GET["restarAlimento"])){
    restarPlato($_GET["restarAlimento"]);
}

if ( isset($_SESSION['usuario'])) {

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
        echo "me activo";
    }
    
    foreach ($resultadoConsulta as $fila) {
        $nombreAlimento = $fila['nombre'];
        $precioAlimento = $fila['precio'];
        $categoriaALimento = $fila['categoria'];
        echo '<label for="' . $nombreAlimento . '">' . $nombreAlimento . '</label>
       <p style="display:inline">'.getNumeroPlato($nombreAlimento).'</p>     
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
    return "Algo ha fallado";
}
function salirDeCuenta(){
    session_unset();
}