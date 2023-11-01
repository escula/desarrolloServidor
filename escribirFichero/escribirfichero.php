<?php
    
    $fichero=fopen("fichero.txt","r+b");
    if(!$fichero){
        echo "error";
    }
    $linea=fread($fichero,filesize("fichero.txt"));
    rewind($fichero);//Retoma el puntero del fichero al principio
    echo $linea;
    fwrite($fichero, "Esta es la siguiente linea");

    
    $fichero=file("fichero.txt");
    print_r($fichero)


?>
// leer con fget
<?php
echo fgets($fichero);


?>