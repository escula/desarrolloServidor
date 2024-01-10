<?php

if(isset($_GET["campoFormulario"])){

    $cookieAGuardar=$_GET["campoFormulario"];
    echo "aqui";
    $_COOKIE[strval(count($_COOKIE))] = $cookieAGuardar;
    setcookie(strval(count($_COOKIE)),$cookieAGuardar,time()+3600);

}

if(isset($_GET["nombreCookieBorrar"])){

    $nombreCookie=$_GET["nombreCookieBorrar"];
    setcookie(strval($nombreCookie),"",time()-60);
    echo "Nombre cookie: ".$nombreCookie;
}

?>

<form action="listaDeTareas.php" method="GET">
    <input type="text" name="campoFormulario">
    <button>Añadir</button>
</form>
<?php

    echo '<ul start="0">';
    foreach ($_COOKIE as $key => $value) {
        echo "<li>";
        echo "valor Cookie: ";
        echo $_COOKIE[$key];
        echo '<a href="listaDeTareas.php?nombreCookieBorrar='.$key.'">eliminar cookie</a>';
        echo "</li>";
    }
    
    echo "</ul>";
?>
