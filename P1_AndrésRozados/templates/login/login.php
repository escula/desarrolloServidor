

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pufosa</title>
    <link rel="icon" type="image/x-icon" href="../../assets/logoMarca.jpeg">
    <link rel="stylesheet" href="login.css">
    <script type="module" src=""></script>
    <link rel="stylesheet" href="../modalMensaje/modalMensaje.css">
</head>
<body>
    <main>
        <section>
            <form action="../../controller/login/loginControlador.php" method="post">
                <div>
                    <label >Usuario</label>
                    <input class="entrada" name="codigo_empleado" value="<?= $_COOKIE["tipo_usuario"]??""?>"type="text" placeholder="Paco Malano" required>
                    <label >Contraseña</label>
                    <input class="entrada" name="password"type="password"placeholder="almorranas" required>
                </div>
                
                <header>
                    <button>Iniciar sesión</button></form>
                </header>
                

        </section>
    </main>
</body>

</html>';



