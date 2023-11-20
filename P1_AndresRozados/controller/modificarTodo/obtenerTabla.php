<?php
include_once "../../model/BBDD.php" ;
include_once "../../constants/erroresSQL.php";
$conexionBD=new BBDD();
    try{
        
        if(isset($_POST['nombreTabla'])){
            if($_POST['nombreTabla']=='informes'){
                
            }else{
                    $resultadoTabla=$conexionBD->selectTodaTabla($_POST['nombreTabla']);
                    $resultadoVista="";
                    $resultadoVista.='<section class="anadir-icono-para-insert"><img src="../../assets/add-circle.svg" alt="añadir fila" onclick="anadirFila()"></section>';
                    $resultadoVista.='<section class="seccion-tabla"><table>
                    <thead>
                            <tr>';
                    if(count($resultadoTabla)>=1){//Si tiene por lo menos alguna fila realizar la tabla si no mandar al front un mensaje de que no hay filas
                        
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
                            // $resultadoVista.='<td><button class="borrarFila" onclick="borrarFila('.$numerofila.')"><img src="../../assets/trash.svg" alt="borrar fila"></button></td>';
                            $resultadoVista.='<td><button class="borrarFila"><img src="../../assets/trash.svg" alt="borrar fila"></button></td>';
                            $resultadoVista.='<td><button class="actualizaFila"><img src="../../assets/sync-circle.svg" alt="actualizar"></button></td>';
                            
                            $resultadoVista.='</tr>';
                        }
                        
                    }else{
                        $arrayNomColumnTabla=$conexionBD->obtenerNombreColumnas($_POST['nombreTabla']);
                        foreach ($arrayNomColumnTabla as $key => $value) {
                            $resultadoVista.='<th>'.$value['COLUMN_NAME'].'</th>'; //Hardcodeamos el nombre porque asi nos quitamos un bucle anidado ;)
                        }
                        $resultadoVista.='</tr>
                        </thead>
                        <tbody>';
                    }
                    $resultadoVista.='</tbody>
                        </table></section>';
                        echo $resultadoVista;//Se envia a la vista
                }
        }
    }catch(PDOException $e){
        echo '<p>'.ErroresSQL::obtenerFraseError($e).'</p>
        <img src="../../assets/rock-eyebrown.gif"/>';
    }
?>