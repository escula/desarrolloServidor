<?php
    class GeneradorVista{
        //1º parametro->['../../palomo/vuela.css','../../palomo/vuela.css','../../palomo/vuela.css']
        //2º parametro->[['../../palomo/vuela.js']]
        //3º parametro usado para indicar en la etiqueta de script si es de tipo defer o async o sin nada(hay que tener en cuenta que los links siempre se van a poner en el head)
        //Nota no se admiten modulos de JS.
        public static function ($platillas=["../../templates/default/platillaPrueba.php"],$array_pathscss=[],$array_pathsJS=[],$tipoCargaJS="defer"){
            pathCssCadena=""
            
            pathJSCadena=""
            echo '
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="icon" type="image/x-icon" href="../../assets/logoMarca.jpeg">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Pufosa</title>
                '
            foreach ($array_pathscss as $rutaCss) {
                echo '<link rel="stylesheet" href="'.$rutaCss.'"';
            }
            foreach ($variable as $rutaJS) {
                echo '<script '.$tipoCargaJS.' src='.$rutaJS.'"</script>';
            }
            foreach ($platillas as $rutaPlatilla) {
                 include $rutaPlatilla';
            }
            echo'
            </head>
            <body>
                <main>
                    <section>
                        <form action="../../controller/login/loginControlador.php" method="post">
                            <div>
                                <label >Usuario</label>
                                <input class="entrada" name="codigo_empleado" value="<?= $_COOKIE["tipo_usuario"]??""?>"type="text" placeholder="Paco Malano" required>
                                <label >Contraseña</label>
                                <input class="entrada" name="password"type="password"placeholder="almorranas" required>
                            </div>
                            
                            <header>
                                <button>Iniciar sesión</button></form>
                            </header>
                            

                    </section>
                </main>
            </body>

            </html>';
        }
    }
    
?>