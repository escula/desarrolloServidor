
<!--Usuarios
Presidente y manager -> Admin (ver, añadir , editar y borrar todas tablas)
Resto -> (ver, añadir, editar y borrar de tabla cliente)

 -->
<?php
$privilegios=[
    "PRESIDENT"=>array("cliente","empleados","trabajos","departamento","ubicacion","informes","log"),
    "MANAGER"=>array("cliente","empleados","trabajos","departamento","ubicacion","log"),
    "STAFF"=>array("cliente"),
    "SECRETARIO"=>array("cliente"),
    "ANALYST"=>array("cliente")
];
    
?>