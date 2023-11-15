

<main>
    <section>
        <form action="../../controller/login/loginControlador.php" method="post">
            <div>
                <label >Usuario</label>
                <input class="entrada" name="codigo_empleado" value="<?= $_COOKIE["codigoEmpleado"]??""?>"type="text" placeholder="Paco Malano" required>
                <label >Contraseña</label>
                <input class="entrada" name="password"type="password"placeholder="almorranas" required>
            </div>
            
            <header>
                <button>Iniciar sesión</button></form>
            </header>
            
    
    </section>
</main>



