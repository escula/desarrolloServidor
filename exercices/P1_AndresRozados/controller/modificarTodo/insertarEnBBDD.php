<?php
include_once '../../model/BBDD.php';
include_once '../../constants/conversionTiposSQLaInputHTML.php';

$conexion=new BBDD();
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
        // header('content-Type: application/json');
        echo print_r($mensajeParaVista);
    }
    


}


// if(isset($_POST["insertarEnTabla"])){
// //     try{
//         $nombreColYValores=array_pop($_POST);
//         echo $_POST;
//         print_r($nombreColYValores);
//         print_r($_POST['insertarEnTabla']);
//         $conexion->insertarCualquierCosa($nombreColYValores,$_POST['insertarEnTabla']);
//         $mensajeParaVista=array("tipoModal"=>"modalCorrecto","mensajePopUp"=>"Borrado realizado");
//     // }catch(PDOException $errorSQL){
        
//     //     $mensajeParaVista=array("tipoModal"=>"modalError","mensajePopUp"=>$errorSQL);
//     // }finally{
//     //     header('content-Type: application/json');
//     //     echo json_encode($mensajeParaVista);
//     // }
    


// }
?>