<form action="resumenCarrito.php" method="GET">

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

    <button name="irACarrito" value="1">Enviar</button>
    <button name="cargar" value="1">Cargar Productos</button>
</form>
carrito: 
<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();

}
if(isset($_GET['borrarProducto'])){
    $productosEnCarrito=json_decode($_SESSION['productos']);
    foreach ($productosEnCarrito as $key => $nombreProducto) {
        if($nombreProducto === $_GET['borrarProducto']){
            unset($productosEnCarrito[$key]);
        }
    }
    $_SESSION['productos']=json_encode($productosEnCarrito);
}
if(session_status()===PHP_SESSION_ACTIVE ){

    $productosEnCarrito=json_decode($_SESSION['productos']);

    foreach ($productosEnCarrito as $key => $nombreProductos) {
        echo " ".$nombreProductos." / ";
        echo '<a href="elegirProductos.php?borrarProducto='.$nombreProductos.'">borrarProducto</a>';
    
    }
}
?>
