<?php
/*
*
*Nota por cda apartado se hace un bucle, 
*lo he hecho asi porque queda mas ordenado visualmente
*Se que para el rendimiento no es lo mejor
*
*/
//---------------Creacion matriz..................
$matriz=[];
for ($i=0; $i <=2 ; $i++) { 
    for ($b=0; $b <=3 ; $b++) { 
        $matriz[$i][$b]=random_int(1,100);
    }
}

for ($i=0; $i <=2 ; $i++) { 
    for ($b=0; $b <=3 ; $b++) { 
        echo $matriz[$i][$b]." ";
    }
    echo "</br>";
}

echo "<pre>";
print_r($matriz);
//--------------Calcular maximos y minimos-----------------
$maximo=-1;
$minimo=-1;

for ($i=0; $i < count($matriz); $i++) { 
    if($maximo===-1 && $minimo===-1){
        $minimo=min($matriz[$i]);
        $maximo=max($matriz[$i]);
    }else{
        if($minimo>min($matriz[$i])){
            $minimo=min($matriz[$i]);
        }
        if($maximo<max($matriz[$i])){
            $minimo=max($matriz[$i]);
        }
    }
}
echo "el maximo es: ".$maximo;
echo "el minimo es: ".$minimo;

//-------------Calculando media de los numeros impares------------
$numeroImpares=0;
$sumaImpares=0;
foreach ($matriz as $fila) {
    foreach ($fila as $value) {
        if($value%2!=0){//Si se mete es impar
            $sumaImpares=$sumaImpares+ $value;
            $numeroImpares++;
        }
    }
}
echo "</br>la media de numeros impares es: ".($sumaImpares/$numeroImpares);

//----------Imprimir la diagonal de la matriz--------------
echo "</br>";
for ($i=0; $i < 3; $i++) { 
    for ($b=0; $b < count($matriz[$i]); $b++) { 
        if($i==$b){
            echo $matriz[$i][$b];

        }else{
            echo " ";
        }
    }
    echo "</br>";
}

//--------Imprime únicamente la primera columna--------------
for ($i=0; $i < count($matriz); $i++) { 
    echo "</br>".$matriz[$i][0];
}
?>