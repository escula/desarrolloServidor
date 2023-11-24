<?php
$conexion=new PDO("mysql:host=$nombreServ;dbname=pufosa;charset=utf8", $usuario, $password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $prepareStatement=$this->conexion->prepare("SELECT * FROM empleados WHERE empleado_ID=?");

 $prepareStatement->bindParam(1, $id, PDO::PARAM_STR);
 $prepareStatement->execute();
 return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);



 $resultado= $this->conexion->exec($sentencia);//devuelve 1 o 0 



 $resultado2= $conexion->query("SELECT producto, unidades FROM stock");
 while($registro=$ $resultado2->fetch){
    echo "Producto".$registro['Producto'];
 }
?>