<?php
class Cookies{
    private static $nombreCookies=[];
    //Se puede usar para crear cookies o sustituir el valor de una cookie
    public static function crearCookie($nombre_cookie,$valor_cookie,$tiempo,$ruta="/"){
        setcookie($nombre_cookie, $valor_cookie, time() + $tiempo, $ruta); 
        array_push(self::$nombreCookies, $nombre_cookie);
    }

    public static function obtenerNombresCokkies():array{
        return self::$nombreCookies;
    }

}
?>