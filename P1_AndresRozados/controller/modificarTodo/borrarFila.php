<?php
include_once "../../model/BBDD.php" ;
include_once "../../constants/erroresSQL.php";
if(isset($_POST['idABorrar'])){
     
    try{
        $conexionBD=new BBDD(); 
        $conexionBD->eliminarFila($_POST['nombreTabla'],$_POST['nombreColumnaID'],$_POST['idABorrar']);

        $mensajeParaVista=array("tipoModal"=>"modalCorrecto","mensajePopUp"=>"Borrado realizado");
    }catch(Exception $excepcion){
        // preg_match("/\\[(.*?)\\]/i", $excepcion, $numeroDeError);
        // $mensajeError=$erroresSQL[$numeroDeError[1]];
        $mensajeError=ErroresSQL::obtenerFraseError($excepcion);
        $mensajeParaVista=array("tipoModal"=>"modalError","mensajePopUp"=>$mensajeError);
    }finally{
        header('content-Type: application/json');
        echo json_encode($mensajeParaVista);
    }

}
?>