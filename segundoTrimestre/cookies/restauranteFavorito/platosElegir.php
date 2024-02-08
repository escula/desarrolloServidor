
<?php

if(session_status()=== PHP_SESSION_ACTIVE){
    echo '<style>
    
        input{
            display:inline-block
        }
    </style>
    <form action="" method="GET">
    
        <label for="lentejas">Lentejas</label>
        <input type="number" name="lentejas" id="lentejas" value="0">
        <label for="pan">Pan</label>
        <input type="number" name="pan" id="pan" value="0">
        <label for="aire">Aire</label>
        <input type="number" name="aire" id="aire" value="0">
        <label for="goldenMeet">Filete dorado</label>
        <input type="number" name="goldenMeet" id="goldenMeet" value="0">
    
        <button>Eviar</button>
    </form>';
}else{
    include_once 'migrations/creacionInicial.php';
    include_once 'seeds/valoresIniciales.php';
    echo '<a href="login.php">Inicie sesion</a>';
}

