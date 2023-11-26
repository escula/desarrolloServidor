<?php
include_once 'cuenta.php';
$cuenta1=new Cuenta("Robert","12321",21.00,21.00);
$cuenta2=new Cuenta("Amparo","12321",21,21);
$cuenta1->ingreso(21);
$cuenta2->reintegro(1);
echo $cuenta1."</br>";
echo $cuenta2."</br>";
echo $cuenta1->transferir($cuenta2,20);
echo "despues de transferencia de 20</br>";
echo $cuenta1."</br>";
echo $cuenta2."</br>";

?>