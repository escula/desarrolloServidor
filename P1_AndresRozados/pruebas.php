<?php
echo '<pre>';
    include './model/BBDD.php';
    // include_once './constants/erroresSQL.php';
    $conexion=new BBDD();
    // $hola=$conexion->selectNombreTablas();//Devuelve un array
    // print_r($hola);
    // echo "<ul>";
    // foreach ($hola as $key=>$value) {
    //     echo $value['nombre'];
       
    // }
    // $baseDatos=array("esto es"=>2,"loco"=>"fsduifboeui");
    // $json=json_encode($baseDatos);
    // echo "</br>";
    // print_r($json);

    // echo "<button onclick='cacatua($json)'>boton</button>";
    // $palabra="PP";
    // $palabra.="+PSO";
    // $palabra.="Junts";
    // echo $palabra;
    // try{
    //     $resultado=$conexion->eliminarFila('cliente','CLIENTE_ID',207);
    //     // $resultado=$conexion->eliminarFila('trabajos','Trabajo_ID',667);
    //     $mensajeParaVista=json_encode(array("tipoModal"=>"modalError","mensajePopUp"=>"fufa"));

    // }catch(Exception $excepcion){
    //     echo(preg_match("/\\[(.*?)\\]/i", $excepcion, $numeroDeError));
    //     $mensajeError=$erroresSQL[$numeroDeError[1]];
    //     $mensajeParaVista=json_encode(array("tipoModal"=>"modalError","mensajePopUp"=>$mensajeError));
        
    // }finally{
    //     echo $mensajeParaVista;
    // }
    // // print_r($conexion->obtenerMetaDatosTabla("empleados"));


    // // echo $resultado;
    // echo obtenerRegx("caca","text");
    // echo "</br>";
    // echo obtenerRegx("decimal(32,0)","number");
    // echo "</br>";
    // echo obtenerRegx("varchar(54)","text");
    // function obtenerRegx($valorCOLUMN_TYPE,$tipoInput){//No permite nulebles
    //     $primerIndiceParentesis=strpos($valorCOLUMN_TYPE,'(');
    //     if($primerIndiceParentesis===false){//Si no tiene (
    //         return "";//na ha sido encontrado
    //     }else{

    //         $maxYOmin=substr($valorCOLUMN_TYPE,$primerIndiceParentesis+1,strlen($valorCOLUMN_TYPE)-$primerIndiceParentesis-2);//Obteniendo valores estre parentesis (32,0)=> 32,0 o tambien (4) => 4 o tambien (32,0,43)=> 32,0,43, ect
    //         if(strpos($valorCOLUMN_TYPE,',')===false){//Si no tiene , significa que es un texto seguro y siempre necesita el mismo regx
    //             return "^.{0,".$maxYOmin."}$";//Solo existe un maximo por eso realizamos un return
    //         }else{
    //             $maxYOminArray= explode(",",$maxYOmin);
    //             if($tipoInput==="text"){//aui hay un if debido a que no es el mismo el regx que hay que fenerar para tipo text que para tipo letra
                    
    //                 return "^.{".$maxYOminArray[1].",".$maxYOminArray[0]."}$";//Solo nos interesan los dos primeros
    //             }else{
    //                 if($maxYOminArray[1]==="0"){//Si el numero que especifica la cantidad de decimales es 0
    //                     return "^([0-9]{1,".$maxYOminArray[0]."})$";//Solo existe un maximo por eso realizamos un return
    //                 }else{
    //                     return "^([0-9]{1,".$maxYOminArray[0]."})+(\.[0-9]{0,".$maxYOminArray[1]."})$";//Solo nos interesan los dos primeros                  
    //                 }
    //             }

    //         }
    //     }
    //     return "alho ha salido mal";
    // }
    // $nombreyColumnasyValor=array("Ubicacion_ID"=>"'2'","GrupoRegional"=>"'otro nuevo'");
    // echo $conexion->modificarCualquierFila($nombreyColumnasyValor,"ubicacion","'4'");
    print_r($conexion->obtenerInforme());

?>
<script>
        function cacatua(baseDatos){
            console.log(baseDatos);
            
        }
</script>