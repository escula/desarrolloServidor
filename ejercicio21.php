<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border:1px solid black;
        }
        th{
            border:1px solid black;
        }
        tr{
            border:1px solid black;
        }
        
    </style>
</head>
<?php
    $agenda=[array("nombre"=>"Jorge","direccion"=>"Madrid","telefono"=>999999999,"correo"=> "jorge@correo.com"),
    array("nombre"=>"Julia","direccion"=>"Valencia","telefono"=>235456987,"correo"=> "julia@correo.com"),
    array("nombre"=>"Lucas","direccion"=>"Orense","telefono"=>222222222,"correo"=> "lucas@correo.com"),
    array("nombre"=>"Susana","direccion"=>"Ávila","telefono"=>987546321,"correo"=> "susana@correo.com")];

    function comprobar($correo){
        $correoABuscar=["@gmail.com", "@educa.madrid.org","@yahoo.com", "@hotmail.com"];
        for ($i=0; $i < count($correoABuscar); $i++) { 

            if(str_contains($correo,$correoABuscar[0])){
                return true;
            }
        }
        return false;
    }
    print('<table><tr><th colspan="3">Agenda</th></tr>');
    print('<tr><td>Clave</td><td>Clave</td><td>Contenido</td></tr>');
    foreach ($agenda as $key=>$datosPersona) {
        if(!comprobar($datosPersona["correo"])){
            print('<tr><td rowspan="5">'.$key.'</tr>');
            foreach ($datosPersona as $key => $value) {
                print('<tr><td>'.$key.'</td>');
                print('<td>'.$value.'</td>');
                print('</tr>');
            }        
            
        }
    }
    print("</table>")
    






?>
<body>
    
</body>
</html>