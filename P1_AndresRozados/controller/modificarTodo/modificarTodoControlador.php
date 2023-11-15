<?php
include_once "../../model/BBDD.php" ;
$conexionBD=new BBDD();
    
    if(isset($_POST['nombreTabla'])){
        $resultadoTabla=$conexionBD->selectTodaTabla();
        echo json_encode($resultadoTabla);
    }

?>