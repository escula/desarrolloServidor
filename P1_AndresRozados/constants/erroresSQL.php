<?php
// son los errores que te devuelve el motor de sql cuando ejecutas una consulta
class ErroresSQL{
    private static $erroresSQL=[
        "23000"=>"No se puede realizar la consulta, debido a que tiene que borrar otros campos antes",
        "42S02"=>"Estas intentando acceder a una tabla que no existe, no me estaras intentando hackear?",
        "42000"=>"La sentencia esta vacia"
    ];
    //Recoge el error de sql y te devuelve una frase
    public static function obtenerFraseError($excepcionSQL){
        preg_match("/\\[(.*?)\\]/i", $excepcionSQL, $numeroDeError);
        return self::$erroresSQL[$numeroDeError[1]];
    }

}
?>