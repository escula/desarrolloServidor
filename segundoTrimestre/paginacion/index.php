<?php
    $limiteInferior= 0;
    $limiteSuperior= 10;
    if(isset($_GET['paginaMostrar'])){
        $pagina = $_GET['paginaMostrar'];

        $limiteInferior= 10*$pagina-10;
        $limiteSuperior= 10*$pagina;
        
    }
    
    // echo '
    echo' <table class="default">
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>telefono</th>
    </tr>';
    
    echo "<tr>";
    $resultado=obtenerClientes($limiteInferior,$limiteSuperior);

    for ($i=0; $i < count($resultado); $i++) { 
        echo '<tr>';
            echo "<td>";
            echo $resultado[$i]["NOMBRE"];
            echo "</td>";
            echo "<td>";
            echo $resultado[$i]["APELLIDOS"];
            echo "</td>";
            echo "<td>";
            echo $resultado[$i]["TELEFONO"];
            echo "</td>";
            echo "</tr>";
        }
        
        
        echo '</table>';
        
        
        for ($i=1; $i <=obtenerNumeroDePaginas() ; $i++) { 
            echo '<a style="margin:0px 20px"href="index.php?paginaMostrar='.$i.'">'.$i.'</a>';
        }


        function obtenerClientes($limiteInferior,$limiteSuperior){
        
            $dsn = 'mysql:host=localhost:3307;dbname=alumnos;charset=utf8';
            $usuario = 'root';
            $contraseña = '';
            $conexion = new PDO($dsn, $usuario, $contraseña);
            $prepareStatement=$conexion->prepare("SELECT NOMBRE, APELLIDOS, TELEFONO FROM alumnos LIMIT ?,10;");
            
        
            $prepareStatement->bindParam(1, $limiteInferior, PDO::PARAM_INT);
        
        
            $prepareStatement->execute();
        
            return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
        }

        function obtenerNumeroDePaginas(){
            $columnas=obtenerNumeroDeFilas();
            return intval($columnas/10);
        }

        //devuelve un numero que corresponde al numero de filas
        function obtenerNumeroDeFilas(){
        
            $dsn = 'mysql:host=localhost:3307;dbname=alumnos;charset=utf8';
            $usuario = 'root';
            $contraseña = '';
            $conexion = new PDO($dsn, $usuario, $contraseña);
            $prepareStatement=$conexion->prepare("SELECT count(CODIGO) AS 'resultado' FROM alumnos;");
                   
            $prepareStatement->execute();
        
            return $prepareStatement->fetch(PDO::FETCH_ASSOC)['resultado'];
        }

