<?php
include_once '../../model/BBDD.php';
include_once '../../constants/conversionTiposSQLaInputHTML.php';
include_once '../../constants/erroresSQL.php';
//Cuando pulsas en el boton para que se te despliegue el modifificar
if(isset($_POST['valoresColumnas'])){


    $conexion=new BBDD();
    
    function obtenerRegxCliente($valorCOLUMN_TYPE,$tipoInput,$palabraPrevia="",$postPalabra=""){//No permite nulebles
        $primerIndiceParentesis=strpos($valorCOLUMN_TYPE,'(');
        if($primerIndiceParentesis===false){//Si no tiene (
            return "";//na ha sido encontrado
        }else{

            $maxYOmin=substr($valorCOLUMN_TYPE,$primerIndiceParentesis+1,strlen($valorCOLUMN_TYPE)-$primerIndiceParentesis-2);//Obteniendo valores estre parentesis (32,0)=> 32,0 o tambien (4) => 4 o tambien (32,0,43)=> 32,0,43, ect
            if(strpos($valorCOLUMN_TYPE,',')===false){//Si no tiene , significa que es un texto seguro y siempre necesita el mismo regx
                return $palabraPrevia."^.{0,".$maxYOmin."}$".$postPalabra;//Solo existe un maximo por eso realizamos un return
            }else{
                $maxYOminArray= explode(",",$maxYOmin);//realizamos un split
                if($tipoInput==="text"){//aui hay un if debido a que no es el mismo el regx que hay que fenerar para tipo text que para tipo letra
                    
                    return $palabraPrevia."^.{".$maxYOminArray[1].",".$maxYOminArray[0]."}$".$postPalabra;//Solo nos interesan los dos primeros
                }else{
                    if($maxYOminArray[1]==="0"){//Si el numero que especifica la cantidad de decimales es 0
                        return 'max="'.(pow(10,$maxYOminArray[0])-1).'"';//calculadon el numero maximo que se permite
                    }else{
                        return 'max="'.(pow(10,$maxYOminArray[0])-1).'" min="'.(1/(pow(10,$maxYOminArray[1]))).'" step="'.(1/(pow(10,$maxYOminArray[1]))).'"';//Solo nos interesan los dos primeros                  
                    }
                }
                
            }
        }
    }

    $mandarAfront=["seccionActualizar"=>"","nuevoIcono"=>""];
    $meataDatosTabla=$conexion->obtenerMetaDatosTabla($_POST['nombreTabla']);
    $mandarAfront["seccionActualizar"]='<form class="formulario-actualizar" id="formulario-insertar">';
    $valoresColumnas=explode("%;$.%&",$_POST["valoresColumnas"]);//Lo pasamos a array porque se ha convertido en string divido entre comas

    $palabraPreviaARegx='pattern="';
    $palabraPosteriorRegx='"';
    $indiceColumna=0;
    foreach ($meataDatosTabla as $cadaColumna) {
        foreach (tiposDeSQLaHTMLinput as $tipoSQL => $tipoInputHTML) {
            if($tipoSQL ==$cadaColumna['DATA_TYPE']){//Para comprobar del decimal o varchar se decedido usar el campo COLUMN_TYPE, para si evitar crear más if. Porque si no tendriamos que crear un if por cada clave distinta que se use para especificar el tamaño minimo y maximo
                
                if($cadaColumna['IS_NULLABLE']=='YES'){
                    $mandarAfront["seccionActualizar"].=  '<td><input type="'.$tipoInputHTML.'" name="'.$cadaColumna['COLUMN_NAME'].'"'.obtenerRegxCliente($cadaColumna["COLUMN_TYPE"],$tipoInputHTML,$palabraPreviaARegx,$palabraPosteriorRegx).' form="formulario-insertar" value="'.$valoresColumnas[$indiceColumna].'"/></td>';
                }else{
                    $mandarAfront["seccionActualizar"].=  '<td><input type="'.$tipoInputHTML.'" name="'.$cadaColumna['COLUMN_NAME'].'"'.obtenerRegxCliente($cadaColumna["COLUMN_TYPE"],$tipoInputHTML,$palabraPreviaARegx,$palabraPosteriorRegx).' form="formulario-insertar" value="'.$valoresColumnas[$indiceColumna].'" required /></td>';
                }
                $indiceColumna=$indiceColumna+1;
            }
        }
        
    }
    $mandarAfront["seccionActualizar"].='<input id="actualizarenTabla" type="hidden" value="'.$_POST['nombreTabla'].'" name="nombreTablaActualizar" form="formulario-insertar" />';
    $mandarAfront["seccionActualizar"].='<input id="idhoriginal" type="hidden" name="idOriginal" value="'.$valoresColumnas[0].'" form="formulario-insertar" />';
    $mandarAfront["seccionActualizar"].='<button id="guardarActualizacion"form="formulario-insertar"><img src="../../assets/save.svg" alt="realizar inserccion de datos" /></button>';
    $mandarAfront["seccionActualizar"].='</form>';
    echo json_encode($mandarAfront);
}

?>