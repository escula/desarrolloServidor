<?php
// r abre el archivo para lectura, puntero al principio
// del fichero.

// r+ abre el fichero para lectura y escritura, puntero al
// principio del fichero.

// w abre el fichero en modo sólo escritura, colocando el
// puntero del archivo al principio. Si el archivo no
// existe se creará, y si existe su contenido será
// borrado

// w+ Lo mismo que el anterior, pero abre el archivo en
// modo lectura y escritura.

// a abre el archivo en modo sólo escritura, colocando el
// puntero del archivo al final del fichero (añade). Si el
// archivo no existe será creado

// a+ Lo mismo que el anterior, pero abre el archivo en
// modo lectura y escritura

$archivo=fopen("nuevoFichero.txt","w+b");//B es para generar el fichero en bits
if($archivo==false){
    echo "ha ahbido un problema al generar archivo";
}else{
    fwrite($archivo,"primera frase\r\n");//r y n por si estas en distintos SO
    fwrite($archivo,"segunda frase\r\n");//tambien se puede usar fputs() para escribir
    fwrite($archivo,"tercera frase\r\n");
    fclose($archivo);
}
//----------------leer linea por linea-----------------
$archivo2=fopen("nuevoFichero.txt","a+");
fread($archivo2,12);//le 13 bytes
rewind($archivo2);//recolocando puntero
echo "</br> fichero entero con fread: </br>";
$texto=fread($archivo2,filesize("nuevoFichero.txt"));//lee todo el fichero
echo $texto;

fclose($archivo2);

//-----------------obtener fichero entero----------------
echo "</br>";
echo "</br> fichero entero con file_get_contents: </br>";
echo file_get_contents("nuevoFichero.txt");


//-----------------devolver array linea por linea----------------
echo "</br></br> devolver array linea por linea: </br>";
$arrayLineaPorLinea=file("nuevoFichero.txt");
print_r($arrayLineaPorLinea);


//---------------recprrer fichero con fgets---------------
echo "</br></br> recorrer fichero hasta encontrar la marca de fin de fichero: </br>";
$archivo3=fopen("nuevoFichero.txt","rb");//Se usa b para no tener problema con los salto de linea

while(feof($archivo3)==false){
    echo fgets($archivo3)."</br>";
}
fclose($archivo3);


//----------------fgetcsv--------------------
//para poder leer css
?>