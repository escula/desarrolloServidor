<?php

// include_once '../../log/creadorLog.php';
include_once '../../model/BBDD.php';
include_once '../../constants/conversionTiposSQLaInputHTML.php';
include_once '../../constants/erroresSQL.php';

$conexion=new BBDD();
if(isset($_POST['nombreTabla'])){
    $mandarAfront=["filaEnTabla"=>"","nuevoIcono"=>""];
    $meataDatosTabla=$conexion->obtenerMetaDatosTabla($_POST['nombreTabla']);
    $mandarAfront["filaEnTabla"]='<form id="formulario">';
    
    
    foreach ($meataDatosTabla as $cadaColumna) {
        foreach (tiposDeSQLaHTMLinput as $tipoSQL => $tipoInputHTML) {
            if($tipoSQL ==$cadaColumna['DATA_TYPE']){//Para comprobar del decimal o varchar se decedido usar el campo COLUMN_TYPE, para si evitar crear más if. Porque si no tendriamos que crear un if por cada clave distinta que se use para especificar el tamaño minimo y maximo
                
                if($cadaColumna['IS_NULLABLE']=='YES'){
                    $mandarAfront["filaEnTabla"].=  '<td><input type="'.$tipoInputHTML.'" name="'.$cadaColumna['COLUMN_NAME'].'" pattern="'.obtenerRegx($cadaColumna["COLUMN_TYPE"],$tipoInputHTML).'" form="formulario" /></td>';
                }else{
                    $mandarAfront["filaEnTabla"].=  '<td><input type="'.$tipoInputHTML.'" name="'.$cadaColumna['COLUMN_NAME'].'" pattern="'.obtenerRegx($cadaColumna["COLUMN_TYPE"],$tipoInputHTML).'" form="formulario" required /></td>';
                }
            }
        }
    }
    $mandarAfront["filaEnTabla"].='<input id="insertarTabla" type="hidden" name="insertarEnTabla" form="formulario" />';
    $mandarAfront["filaEnTabla"].='</form>';
    $mandarAfront["nuevoIcono"]='<section class="anadir-icono-para-insert"><button form="formulario" onclick="enviarFila()" ><img src="../../assets/save.svg" alt="realizar inserccion de datos" /></button></section>';
    echo json_encode($mandarAfront);
}
    /*
    *Sirve para devolver un regx de un que se obtiene del tipo de columna ejemplo:
    *varchar(30,5) return => ".{5,30}" / decimal(,5) return => ".{5,30}"
    */
    function obtenerRegx($valorCOLUMN_TYPE,$tipoInput){//No permite nulebles
        $primerIndiceParentesis=strpos($valorCOLUMN_TYPE,'(');
        if($primerIndiceParentesis===false){//Si no tiene (
            return "";//na ha sido encontrado
        }else{

            $maxYOmin=substr($valorCOLUMN_TYPE,$primerIndiceParentesis+1,strlen($valorCOLUMN_TYPE)-$primerIndiceParentesis-2);//Obteniendo valores estre parentesis (32,0)=> 32,0 o tambien (4) => 4 o tambien (32,0,43)=> 32,0,43, ect
            if(strpos($valorCOLUMN_TYPE,',')===false){//Si no tiene , significa que es un texto seguro y siempre necesita el mismo regx
                return "^.{0,".$maxYOmin."}$";//Solo existe un maximo por eso realizamos un return
            }else{
                $maxYOminArray= explode(",",$maxYOmin);
                if($tipoInput==="text"){//aui hay un if debido a que no es el mismo el regx que hay que fenerar para tipo text que para tipo letra
                    
                    return "^.{".$maxYOminArray[1].",".$maxYOminArray[0]."}$";//Solo nos interesan los dos primeros
                }else{
                    if($maxYOminArray[1]==="0"){//Si el numero que especifica la cantidad de decimales es 0
                        return "^([0-9]{1,".$maxYOminArray[0]."})$";//Solo existe un maximo por eso realizamos un return
                    }else{
                        return "^([0-9]{1,".$maxYOminArray[0]."})+(\.[0-9]{0,".$maxYOminArray[1]."})$";//Solo nos interesan los dos primeros                  
                    }
                }

            }
        }
    }
    if(isset($_POST["insertarEnTabla"])){
        try{
            $nombreColYValores=array_slice($_POST,0,-1);
            print_r( $_POST);
            print_r($nombreColYValores);
            print_r($_POST['insertarEnTabla']);
            echo $resultado=$conexion->insertarCualquierCosa($nombreColYValores,$_POST['insertarEnTabla']);
            $mensajeParaVista=array("tipoModal"=>"modalCorrecto","mensajePopUp"=>"Borrado realizado");
        }catch(PDOException $errorSQL){
            $mensajeParaVista=array("tipoModal"=>"modalError","mensajePopUp"=>ErroresSQL::obtenerFraseError($errorSQL));
        }finally{
            header('content-Type: application/json');
            echo print_r($mensajeParaVista);
        }
        


    }
?>