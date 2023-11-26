<?php
/**
 * Nota: He entendido como mostrar y crear que hace falta mostrar la frase dentro de archivo y mostrarla por la pantalla
 * 
 */
class Agenda{
    private $nombreFicheroAgenda;
    public function __construct($nombreFichero){
        $this->nombreFicheroAgenda=$nombreFichero;
    }
    public function escribirLinea($nombre,$direccion,$telefono,$email){
        $archivo=fopen($this->nombreFicheroAgenda,"a+b");
        fwrite($archivo,"nombre: ".$nombre." direccion: ".$direccion." telefono: ".$telefono." email ".$email."\r\n");
        fclose($archivo);
    }
    public function imprimirPorPantalla(){
        if(file_exists($this->nombreFicheroAgenda)){//Si existe el fichero eliminamos la primera fila con "no hay contactos" y despues printeamos todos los arrays
            $filas=file($this->nombreFicheroAgenda);
            if(count($filas)>0 && $filas[0]==="No hay contactos\r\n"){//Detectamos si dentro del fichero
                array_shift($filas);
                $archivo=fopen($this->nombreFicheroAgenda,"wb");
                for ($i=0; $i < count($filas); $i++) { 
                    fwrite($archivo,$filas[$i]);//reescribirmos el fichero sin la fraseNo Hay contactos
                }   
                fclose($archivo);
            }
            $archivo=fopen($this->nombreFicheroAgenda,"rb");
            while(feof($archivo)==false){
                echo fgets($archivo)."</br>";
            }
            fclose($archivo);

        }else{//Creamos y escribimos no hay contactos
            $archivo=fopen($this->nombreFicheroAgenda,"w+b");
            fwrite($archivo,"No hay contactos\r\n");
            echo "No hay contactos</br>";
            fclose($archivo);
        }
    }

}

$agenda=new Agenda("contactos.txt");
if(isset($_GET["nombre"])){
    $agenda->escribirLinea($_GET["nombre"],$_GET["direccion"],$_GET["telefono"],$_GET["correo"]);
}
$agenda->imprimirPorPantalla();

?>
<form action="agenda.php" method="GET">
    <label for="nom"></label>
    <input type="text" name="nombre" id="nom" requiered>
    <label for="direc">Direccion</label>
    <input type="text" name="direccion" id="direc" requiered>
    <label for="let">telefono</label>
    <input type="tel" name="telefono" id="tel" requiered>
    <label for="email">Correo</label>
    <input type="email" name="correo" id="email"" requiered>
    <button>Introducir contacto</button>
</form>