<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="formulario.php" method="get"> 

        <input type="text" name="number1"placeholder="Introduce los cigarros que quieres" pattern="[1-9]{2}" title="2 cifras como maximo">
        <input type="text" name="number2"placeholder="Introduce los cigarros que quieres" pattern="[1-9]{2}" title="2 cifras como maximo">
        <!-- <input type="submit" value="lama"> -->
        <button type="submit">432432</button>
    </form>
    <?php
        if(isset($_GET["number1"]) && isset($_GET["number2"])){
            $numero1=$_GET["number1"];
            $numero2=$_GET["number2"];
            echo"<script>debugger;</script>";
            echo "<p>".$numero1+$numero2."</p>";
        }
    
    ?>

<form action="formulario.php" method="post"> 

    <input type="text" name="number1post"placeholder="Introduce los cigarros que quieres" pattern="[1-9]{2}" title="2 cifras como maximo">
    <input type="text" name="number2post"placeholder="Introduce los cigarros que quieres" pattern="[1-9]{2}" title="2 cifras como maximo">
    <!-- <input type="submit" value="lama"> -->
    <button type="submit">432432</button>
</form>
<?php
    if(isset($_POST["number1post"]) && isset($_POST["number2post"])){
        $numero1=$_POST["number1post"];
        $numero2=$_POST["number2post"];
        echo"<script>debugger;</script>";
        echo "<p>".$numero1+$numero2."</p>";
    }

?>

</body>
</html>