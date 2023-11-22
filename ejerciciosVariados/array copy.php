<?php
    $sueldo=2750;
    $retencion=22;
    $sueldoNeto=$sueldo-($sueldo*$retencion/100);
    echo "<table style='border:1px solid black'>";
    echo "<tr>";
    echo "<td>Sueldo: ".$sueldo."</td>";
    echo "<td>Retención: ".$retencion."</td>";
    echo "<td>Sueldo Neto: ".$sueldoNeto."</td>";
    echo "</tr>";
    echo "</table>";
?>

<?php

function sumar($ultimoNumero,$penultimo){
    echo "</br>".$ultimoNumero;
    $ultimoNumero=$penultimo+$ultimoNumero;
    if($ultimoNumero<100){
        sumar($ultimoNumero=$penultimo+$ultimoNumero);
    }
    return $ultimoNumero;
    
}
?>