<?php
echo "<pre>";
$nombre ="dadds";
echo empty($nombre); //Comprueba si esta vacia la vatiable :bool
echo "</br>".getType($nombre);

echo "</br>----------------------parsear----------------------------------";
echo "</br>".intval($nombre);
$numeroEntero=12342;
echo "</br>".strval($numeroEntero);
echo "</br>".doubleval($numeroEntero);

echo "</br>----------------------Funciones array---------------------------";
$arrayVariado=["3232",12,43,21,"hola"];
echo "</br>".in_array(12,$arrayVariado);//primero valor a buscarm segundo el array

$arrayComplejo=array(array('DWES',"DWEC"),array("DAW","DIW"),"IEE");
echo "</br>".in_array(array('DWES',"DWEC"),$arrayComplejo);


$agenda = array(
    array("Nombre"=>"Jorge", "Telefono"=>"999999999", "Correo"=>"jorge@ejemplo.com", "Direccion"=>"Calle 123"),
    array("Nombre"=>"Susana", "Telefono"=>"888888888", "Correo"=>"susana@ejemplo.com", "Direccion"=>"Avenida 456"),
    array("Nombre"=>"Lucas", "Telefono"=>"777777777", "Correo"=>"Lucas@ejemplo.com", "Direccion"=>"callecita 23"),
    array("Nombr"=>"Julia", "Telefono"=>"666666666", "Correo"=>"julia@ejemplo.com", "Direccion"=>"pisaco 23"),
);
echo "<br> array_column():-->  ";
print_r( array_column($agenda,'Nombre')); //te devuelve vuelve los valores del para con Nombre de los subarrays 


if(in_array('Susana',array_column($agenda,'Nombre'))){
    echo "</br>susana esta dentro del sub array";
}

echo "</br>insertar y borrar indices arrays (code)";
array_push($arrayVariado,123);//inserta un elmento al final
array_unshift($arrayVariado, "manzana", "frambuesa");//Inserta un elelmento al principio

$nuevoArray=array_shift($arrayVariado);//se borra primer elmento
$nuevoArray=array_pop($arrayVariado);//Borra el ulrimo elemento

echo "</br>-----Ordenar Array-----";
$ordenar=[12,213,43,212,2];
echo "</br>array original:  --> ".print_r($ordenar);

echo "</br>Ordenado array normal por sort: ";//Se puede usar rsort para descendiente
sort($ordenar,SORT_NUMERIC);//Tiene unos flag
print_r($ordenar);


echo "</br>Ordenado array asociativo por asort: ";//Se puede usar arsort para descendiente
$asociativo = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
asort($asociativo);//Tiene unos flag
print_r($asociativo);


echo "</br>Ordenado varios arrays: ";
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);
print_r($ar1);

echo "Ordenar un array multidimensional por un valor <br>";
$array=[];
$array[]=(object)["nombre"=>"Juan","edad"=>30];
$array[]=(object)["nombre"=>"Maria","edad"=>26];
$array[]=(object)["nombre"=>"David","edad"=>24];
$array[]=(object)["nombre"=>"Ana","edad"=>27];

$columns = array_column($array, 'edad');
array_multisort($columns, SORT_ASC, $array);
echo "<br>";
print_r($array);


echo "</br>eliminar valores duplicados en array";
$repetido=[1,1,2,2,3,3];
array_unique($repetido);
print_r($repetido);


echo "</br>/--------------------------Numero Aleatorio------------------------------";
echo "</br>".random_int(1,200);

echo "</br>/--------------------------String------------------------------";
$cadena="Hola que HaAces";
echo "</br>: tamaño string: ".strlen($cadena);
echo "</br>: todas a minusculas: ".strtolower($cadena);
echo "</br>: todas a mayuscula: ".strtoupper($cadena);
echo "</br>: todas a mayuscula: ".strtoupper($cadena);
echo "</br>: todas a mayuscula: ".strtoupper($cadena);
echo "</br>: primer caracter de plabra a minuscula:".lcfirst($cadena);
echo "</br>: primer caracter de plabra a mayuscula:".ucfirst($cadena);
echo "</br>: substring string".substr($cadena,2,5);//segundo parametro empieza en 0, tercero es la logitud
echo "</br>: remplazar".str_replace("Hola","adios",$cadena) //str_replace(txt_buscar,txt_sustituto,cadena)


echo "</br>/--------------------------Burbuja------------------------------";
function burbuja($array) {
    $longitud = count($array);
    for ($i = 1; $i < $longitud; $i++) {
        for ($j = 0; $j < $longitud - $i; $j++) {
            if ($array[$j] > $array[$j+1]) {
                // Intercambiar elementos
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }
    return $array;
 }
?>
