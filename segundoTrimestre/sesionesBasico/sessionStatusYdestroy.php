<?php
if(session_status()=== PHP_SESSION_DISABLED){
    echo "estoy deshabilitada en el servidor";
}
if(session_status()=== PHP_SESSION_NONE){
    echo "no estoy activa";
    session_start();
}
if(session_status()=== PHP_SESSION_ACTIVE){
    echo "estoy activa";
}

?>


