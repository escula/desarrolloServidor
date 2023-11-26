<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="server.php" method="POST">
        <input type="text" name="dnionie" id="" placeholder="DNI o NIE">
        <button>Enviar documento de identidad</button>
    </form>
    <p>Siguiente formulario es para rezliar pruebas mas info en codigo:</p>
    <p>Si usa esta funcion tenga paciencia poque dependiendo del numero le llevara mas tiempo o menos al ordenador </p>
    <form action="server.php" method="GET">
        <label for="">Indice de la letra a obtener</label>
        <input type="number" name="indiceLetra" id="" placeholder="3|7|0">
        <label for="">Primer nummero</label>
        <input type="number" name="primerDigito" value=0 id="" placeholder="3|7|0">
        <label for="">El numero de cifras</label>
        <input type="number" name="numerodeCifras" id="" value=8 placeholder="8|7,ect">
        <button>quiero un numero de documentacion</button>
    </form>
    
</body>
</html>