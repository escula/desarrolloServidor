<?php
$serverName = "localhost:3306";
$username = "root";
$password = "";
$nombreBBDD = "restaurante";
$contraseña = "1234";


session_start();
if (session_status() === PHP_SESSION_ACTIVE) {

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
    iniciarCookie($resultadoConsulta);
    sumarPlato('aire');

    // print_r($_COOKIE['Platos']);
    // foreach ($resultadoConsulta as  $fila) {
    //    $nombreAlimento=$fila['nombre'];
    //    $precioAlimento=$fila['precio'];
    //    $categoriaALimento=$fila['categoria'];
    //    echo '<label for="'.$nombreAlimento.'">'.$nombreAlimento.'</label>
    //    <p style"display:inline"></p>     
    //    <button name="sumarAlimento" value="'.$nombreAlimento.'">Añadir</button>
    //    <button name="restarAlimento" value="'.$nombreAlimento.'">Quitar</button>
    //    <p>'.$categoriaALimento.'</p>
    //    </br>';


    // }
    echo '</form>';
    echo '<button>Generar Cuenta</button>';
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
    $productosJson = json_encode($valorCookie);
    setcookie('Platos', $productosJson, time() + 300000, '/');
}
function sumarPlato($nombrePlatoAincrementar)
{
    $platosCookie = json_decode($_COOKIE['Platos']);
    for ($i = 0; $i < count($platosCookie); $i++) {
        print_r($platosCookie[$i]);
        $nombrePlato = array_keys($platosCookie[$i]);
        $numeroPlato = array_values($platosCookie[$i]);
        $platosCookie[$i][$nombrePlato] = $numeroPlato[0] + 1;
        
        // if ($nombrePlato == $nombrePlatoAincrementar) {
        //     $platosCookie[$i][$nombrePlato] = $numeroPlato[0] + 1;
        //     echo $platosCookie[$i][$nombrePlato];
        //     echo "hola";
        //     break;
        // }
        // foreach ($platosCookie[$i] as $nombrePlato=>$numeroDePlato) {
        //     echo $nombrePlato;
        //     echo " ".$numeroDePlato;
        //     echo '</br>';
        //     if($nombrePlato==$nombrePlatoAincrementar){
        //         $numeroDePlato=$numeroDePlato+1;
        //         echo "hola";
        //         break;
        //     }

        // }
    }
    print_r($platosCookie);
    $resultado = json_encode($platosCookie);
    $productosJson = $resultado;
    $_COOKIE['Platos'] = $resultado;
    echo '</br>';
    print_r($_COOKIE['Platos']);
    setcookie('Platos', $productosJson, time() + 300000, '/');

}

// function restarPlato($nombrePlato){
//     $valorCookie=[];
//     foreach ($platosEnBBDD as $plato) {
//         array_push($valorCookie,array($plato['nombre']=>0));

//     }
//     $productosJson=json_encode($valorCookie);
//     setcookie('Platos',$productosJson,time()+300000,'/');
// }