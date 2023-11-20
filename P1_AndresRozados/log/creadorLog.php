<?php
class CreadorLog{
    //No una propiedad de la ruta del fichero ya que el nombre del fichero puede variar

    public static function crearLog($nombreFichero="logSQL.log",$tipoError,$mensajeLog,$anadirTiempo=True){
        $rutalog="../../log/".$nombreFichero;
        
        $archivoAModificar=fopen($rutalog,"a+");

        if($anadirTiempo==true){
            $tiempoEnQueSeGenera=strval(date('Y-m-d H:i:s'));
            fwrite($archivoAModificar,"\n".$tiempoEnQueSeGenera." [".$tipoError."]:".$mensajeLog);
        }else{
            fwrite($archivoAModificar,"\n"."[".$tipoError."]:".$mensajeLog);
        }
        fclose($archivoAModificar);

    }
    public static function obtenerContenidoLog($ficheroAleer="logSQL.log"){
        $contenido =file_get_contents($_SERVER["DOCUMENT_ROOT"]."/exercices/P1_AndresRozados/log/".$ficheroAleer);
        return $contenido;
    }
}
CreadorLog::crearLog("error.log","Error","Esto es una prueba1",True);
CreadorLog::crearLog("error.log","Error","Esto es una prueba2",False);
CreadorLog::crearLog("error.log","Error","Esto es una prueba3",True);

?>

