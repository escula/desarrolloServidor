
<body>
    <head>
        <?php
            function calcularEdad(){
                return Edad;
            }
        ?>
    </head>
    <?php
        const Edad=2002;
        $nombre = "Andrés";
        $apellido = "Rozados";
        echo "Hola mundo";
        echo "nombre:". $nombre;
        echo "<p>Estoy contado:" . calcularEdad() . "</p>"


        ?>
    <p>lama <?= calcularEdad();?></p>
    <p>lama <?= calcularEdad() < 20 ?"soy menor 20": "soy mayor de 20" ?></p>
</body>