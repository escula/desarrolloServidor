<?php

    //Cuando borramos
    if(isset($_GET['backForm'])){ 
        foreach ($_COOKIE as $nombreCookiePerro => $valorCookieMerluzo) {
            setcookie($nombreCookiePerro,"",time()-1);
        }
        echo '<form action="cookiesPreferenciasUsuario.php" method="GET">
    
        <label for="">Color fondo nano</label>
        <input type="color" name="backgroundColor">
        
        <label for="colorLetra">nano pon color letra</label>
        <input type="color" name="letterColor" id="colorLetra">
        
        <label for="">Ahora tipografia</label>
        <select name="typography" id="">
            <option value="Arial">Arial</option>
            <option  value="sans-serif">sans-serif</option>
            <option  value="Helvetica">Helvetica</option>
        </select>
        
        <label for="nombrePersona">nombre</label>
        <input type="text" id="nombrePersona" name="name">
        
        <label for="apellidoPersona">nombre</label>
        <input type="text" id="apellidoPersona" name="lastName">
        
        <button>Enviar datos</button>
        
    </form>';
    }else if(count($_COOKIE)>0){

        //Cuando tenemos las cookies en el servidor
        echo '<style> html{background-color:'.$_COOKIE['backgroundColor'].'}</style>';
        echo '<h1 style="font-family:'.$_COOKIE['typography'].'; color:'.$_COOKIE['letterColor'].'"> Hola '.$_COOKIE['name'].'</h1>';
        echo '
        <form action="cookiesPreferenciasUsuario.php" method="GET">
            <button name="backForm" value="1">Lavadora vuelve a la pagina de formulario</button>         
        </form>';

    }else if(isset($_GET['letterColor'])){

        //Cuando mandamos las cookies al navegador pero debemos imprimir la pantalla
        print_r($_GET);
        foreach ($_GET as $nombreCookiePerro => $valorCookieMerluzo) {
            setcookie($nombreCookiePerro,$valorCookieMerluzo,time()+3600); //Mandando al cliente las cookies
            $_COOKIE[$nombreCookiePerro]=$valorCookieMerluzo; // Metiendomelo en el array del servidor
        }

        echo '<style> html{background-color:'.$_COOKIE['backgroundColor'].'}</style>';
        echo '<h1 style="font-family:'.$_COOKIE['typography'].'; color:'.$_COOKIE['letterColor'].'"> Hola '.$_COOKIE['name'].'</h1>';
        echo '
        <form action="cookiesPreferenciasUsuario.php" method="GET">
            <button name="backForm" value="1">Lavadora vuelve a la pagina de formulario</button>         
        </form>';

    }else{
        
        //Cuando no tiene ni cookie ni se ha mandado el formulario
        foreach ($_COOKIE as $nombreCookiePerro => $valorCookieMerluzo) {
            setcookie($nombreCookiePerro,"",time()-1);
        }
        echo '<form action="cookiesPreferenciasUsuario.php" method="GET">
    
        <label for="">Color fondo nano</label>
        <input type="color" name="backgroundColor">
        
        <label for="colorLetra">nano pon color letra</label>
        <input type="color" name="letterColor" id="colorLetra">
        
        <label for="">Ahora tipografia</label>
        <select name="typography" id="">
            <option value="Arial">Arial</option>
            <option  value="sans-serif">sans-serif</option>
            <option  value="Helvetica">Helvetica</option>
        </select>
        
        <label for="nombrePersona">nombre</label>
        <input type="text" id="nombrePersona" name="name">
        
        <label for="apellidoPersona">nombre</label>
        <input type="text" id="apellidoPersona" name="lastName">
        
        <button>Enviar datos</button>
        
    </form>';
    }

?>