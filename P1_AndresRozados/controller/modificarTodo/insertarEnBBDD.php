<?php
include_once '../../model/BBDD.php';
// if(isset($_POST["insertarEnTabla"])){
//     try{
        $nombreColYValores=array_pop($_POST);
        echo $_POST;
        print_r($nombreColYValores);
        print_r($_POST['insertarEnTabla']);
        $conexion->insertarCualquierCosa($nombreColYValores,$_POST['insertarEnTabla']);
        $mensajeParaVista=array("tipoModal"=>"modalCorrecto","mensajePopUp"=>"Borrado realizado");
    // }catch(PDOException $errorSQL){
        
    //     $mensajeParaVista=array("tipoModal"=>"modalError","mensajePopUp"=>$errorSQL);
    // }finally{
    //     header('content-Type: application/json');
    //     echo json_encode($mensajeParaVista);
    // }
    


// }
?>