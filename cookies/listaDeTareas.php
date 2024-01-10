<?php

if(isset($_GET["campoFormulario"])){

    $cookieAGuardar=$_GET["campoFormulario"];

    setcookie(strval(sizeof($_COOKIE)),$cookieAGuardar);
}
if(isset($_GET["eliminarCookie"])){

    $idCookie=$_GET["idCookieAEliminar"];

    setcookie(strval($idCookie),"",);
}

?>

<form action="listaDeTareas.php" method="GET">
    <input type="text" name="campoFormulario">
    <button>Añadir</button>
</form>
<?php

    echo '<ol start="0">';
    for ($i=0; $i < sizeof($_COOKIE); $i++) { 
        echo "<li>";
        echo "valor Cookie: ";
        echo $_COOKIE[$i];
        echo '<a href="listaDeTareas.php?idCookieAEliminar='.$i.'">eliminar cookie</a>';
        echo "</li>";
        
    }
    
    echo "</ol>";
?>
