<?php
    class GeneradorVista{
        //1º parametro->['../../palomo/vuela.css','../../palomo/vuela.css','../../palomo/vuela.css']
        //2º parametro->[['../../palomo/vuela.js']]
        //3º parametro usado para indicar en la etiqueta de script si es de tipo defer o async o sin nada(hay que tener en cuenta que los links siempre se van a poner en el head)
        //Nota no se admiten modulos de JS.
        public static function generarVista($platillas=["../../templates/default/platillaPrueba.php"],$array_pathscss=[],$array_pathsJS=[],$tipoCargaJS="defer"){
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
                echo '<link rel="stylesheet" href="'.$rutaCss.'"';
            }
            foreach ($array_pathsJS as $rutaJS) {
                echo '<script '.$tipoCargaJS.' src='.$rutaJS.'"</script>';
            }
            echo '</head>
            <body>';
            foreach ($platillas as $rutaPlatilla) {
                 include_once $rutaPlatilla;
            }
            echo '
            </body>
            </html>';
        }
    }
    
?>