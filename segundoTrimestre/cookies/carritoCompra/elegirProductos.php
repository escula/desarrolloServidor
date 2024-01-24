
<form action="elegirProductos.php" method="GET">

    <input type="checkbox" name="cebolla" id="cebolla">
    <label for="cebolla">cebolla 1€</label>

    <input type="checkbox" name="lechuga" id="lechuga">
    <label for="lechuga">lechuga 1€</label>

    <input type="checkbox" name="puerro" id="puerro">
    <label for="puerro">puerro 3€</label>

    <input type="checkbox" name="batatas" id="batatas">
    <label for="batatas">batatas 2€</label>

    <input type="checkbox" name="zumoChristian" id="zumoChristian">
    <label for="zumoChristian">zumoChristian 5€</label>

    <button name="cargar" value="cargar">Meter en cesta</button>
</form>
<a href="resumenCarrito.php">Ir a resultado</a>
carrito: 
<?php
$precio=array("cebolla"=>1,"lechuga"=>1,"puerro"=>3,"batatas"=>2,"zumoChristian"=>5);

if(session_status()===PHP_SESSION_NONE){
    session_start();
    $_SESSION['productos'] = isset($_SESSION['productos'])?$_SESSION['productos']:array();
    
}

if(isset($_GET['cargar']) ){
    foreach ($_GET as $nombreProducto => $valor) {
        if(in_array($nombreProducto,array_keys($precio))){
            $_SESSION['productos'][$nombreProducto]=$precio[$nombreProducto];     
        }
    }
}

// Se ejecuta cuando pulsado en borrar producto
if(isset($_GET['borrarProducto'])){
    unset($_SESSION['productos']['puerro']);
}


if(session_status()===PHP_SESSION_ACTIVE ){
    imprimirCesta();
    
}


//imprimir productos en cesta
function imprimirCesta(){

    foreach ($_SESSION['productos'] as $nombreProducto => $precio) {
        echo " ".$nombreProducto." / ";
        echo '<a href="elegirProductos.php?borrarProducto='.$nombreProducto.'">borrarProducto</a>';
    
    }
}
?>
