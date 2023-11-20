
<?php
    include_once '../../model/BBDD.php';
    include_once '../../constants/conversionTiposSQLaInputHTML.php';
    include_once '../../constants/erroresSQL.php';

    if(isset( $_POST['nombreTablaActualizar'])){
        try{
            $conexion=new BBDD();
            // print_r( array_keys($_POST));
            $NombreColumnaYValor=array_slice($_POST,0,-2);//Quitamos los campos de tipo hidden que son siempre 2
            
            foreach ($NombreColumnaYValor as $nombreColumna => $valorColumna) {
                $NombreColumnaYValor[$nombreColumna]='"'.$valorColumna.'"';
            }
            
            $conexion->modificarCualquierFila($NombreColumnaYValor,$_POST['nombreTablaActualizar'],$_POST['idOriginal']);
            $mensajeParaVista=array("tipoModal"=>"modalCorrecto","mensajePopUp"=>"Se ha realizado la actualizacion satisfactoriamente");
        }catch(PDOException $errorSQL){
            $mensajeParaVista=array("tipoModal"=>"modalError","mensajePopUp"=>ErroresSQL::obtenerFraseError($errorSQL));
        }catch(Exception $e){
            $mensajeParaVista=array("tipoModal"=>"modalError","mensajePopUp"=>"Ha ocurrido algun error");
        }finally{
            header('content-Type: application/json');
            $parafront=json_encode($mensajeParaVista);
            echo $parafront;
        }
    }
?>