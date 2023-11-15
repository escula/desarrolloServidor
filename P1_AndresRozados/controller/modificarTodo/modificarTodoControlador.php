<?php
include_once "../../model/BBDD.php" ;
$conexionBD=new BBDD();
    
    if(isset($_POST['nombreTabla'])){
        //funcion
        $resultadoTabla=$conexionBD->selectTodaTabla("cliente");
        echo json_encode($resultadoTabla);
    }


?>