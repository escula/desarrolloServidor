<?php
class CreadorLog{
    private static $archivo;

    public static function crearLog($nombreFichero="error.log",$tipoError,$mensajeLog,$anadirTiempo=True){
        echo $_SERVER["DOCUMENT_ROOT"];
        $rutalog=$_SERVER["DOCUMENT_ROOT"]."/exercices/P1_AndresRozados/log/".$nombreFichero;
        
        $archivoAModificar=fopen($rutalog,"a+");

        if($anadirTiempo==true){
            $tiempoEnQueSeGenera=strval(date('Y-m-d H:i:s'));
            fwrite($archivoAModificar,"\n".$tiempoEnQueSeGenera." [".$tipoError."]:".$mensajeLog);
        }else{
            fwrite($archivoAModificar,"\n"."[".$tipoError."]:".$mensajeLog);
        }
        fclose($archivoAModificar);

    }
}
CreadorLog::crearLog("error.log","Error","Esto es una prueba1",True);
CreadorLog::crearLog("error.log","Error","Esto es una prueba2",False);
CreadorLog::crearLog("error.log","Error","Esto es una prueba3",True);

?>

