<?php
include_once "../../model/BBDD.php" ;
$conexionBD=new BBDD();
    
    if(isset($_POST['nombreTabla'])){
    
        $resultadoTabla=$conexionBD->selectTodaTabla($_POST['nombreTabla']);
        if(count($resultadoTabla)>=1){//Si tiene por lo menos alguna fila realizar la tabla si no mandar al front un mensaje de que no hay filas
            $resultadoVista="";
            $resultadoVista.='<table>
            <thead>
                    <tr>';
            foreach ($resultadoTabla[0] as $nombreColumna => $valorColumna) {
                $resultadoVista.='<th>'.$nombreColumna.'</th>';
            }

            $resultadoVista.='</tr>
            </thead>
            <tbody>';

            foreach ($resultadoTabla as $numerofila=>$arrayContieneFila) {//La contruccion del formulario tambien se podría hacer en el cliente pasandole un json o un xml
                $resultadoVista.='<tr>';
                foreach ($arrayContieneFila as $ValorDeCadaCasillaDeFila) {
                    $resultadoVista.='<td>'.$ValorDeCadaCasillaDeFila.'</td>';        
                }
                $resultadoVista.='<td><button class="borrarFila" onclick="borrarFila('.$numerofila.')"><img src="../../assets/trash.svg" alt="borrar fila"></button></td>';
                $resultadoVista.='</tr>';
            }
            
            $resultadoVista.='</tbody>
            </table>';
            echo "$resultadoVista";//Se envia a la vista


        }else{
            echo "<p>No hay filas<p>";
        }
    }
    if(isset($_POST['idABorrar'])){

        $numFilEliminadas=$conexionBD->eliminarFila($_POST['nombreTabla'],$_POST['nombreColumnaID'],$_POST['idABorrar']);
        
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        // echo json_encode($resultadoTabla);
    // }


?>