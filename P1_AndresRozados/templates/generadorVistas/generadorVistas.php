<?php

    class GeneradorVista{
        //1º parametro->['../../palomo/vuela.css','../../palomo/vuela.css','../../palomo/vuela.css']
        //2º parametro->[['../../palomo/vuela.js']]
        //3º parametro usado para indicar en la etiqueta de script si es de tipo defer o async o sin nada(hay que tener en cuenta que los links siempre se van a poner en el head)
        //4º Si importa las vistas de .php con include o con include_once por defecto es este ulitmo
        //Nota no se admiten modulos de JS.
        public static function generarVista($platillas=["../../templates/prueba/platillaPrueba.php"],$array_pathscss=[],$array_pathsJS=[],$tipoCargaJS="defer",$tipoCargaPhp="include_once"){
            
            echo '
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="icon" type="image/x-icon" href="../../assets/logoMarca.jpeg">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Pufosa</title>
                ';
            foreach ($array_pathscss as $rutaCss) {
                if(file_exists($rutaCss)){
                    echo '<link rel="stylesheet" href="'.$rutaCss.'">';
                }else{
                    echo "no existe la ruta del css: ".$rutaCss;
                }
                
            }
            foreach ($array_pathsJS as $rutaJS) {
                if(file_exists($rutaJS)){
                    echo '<script '.$tipoCargaJS.' src='.$rutaJS.'"</script>';
                }else{
                    echo "no existe la ruta del JS: ".$rutaJS;
                }
            }
            echo '</head>
            <body>';
            if($tipoCargaPhp==="include_once"){
                foreach ($platillas as $rutaPlatilla) {
                    if(file_exists($rutaCss)){
                        include_once $rutaPlatilla;
                    }else{
                        echo "no existe la ruta del php: ".$rutaPlatilla;
                    }
                    
               }
            }else if($tipoCargaPhp==="include"){
                if(file_exists($rutaCss)){
                    include $rutaPlatilla;
                }else{
                    echo "No existe la ruta del php: ".$rutaPlatilla;
                }
            }
            
            echo '
            </body>
            </html>';
        }
    }
    
?>