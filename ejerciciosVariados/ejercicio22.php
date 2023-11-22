<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio9.php" method="get">
        <input type="submit">
    </form>
    <?php
    // modificar el array inicial
        $arrayAsociativo=["CE2134"=>array("nombre"=>"Arturo","age"=>21,"Salario"=>4354)];
        
        function calcularSalario($personalInfo){
            $name=$personalInfo["CE2134"]["nombre"];
            $currentSalary=$personalInfo["CE2134"]["salario"];
            $age=$personalInfo["CE2134"]["age"];
            if($currentSalary>2000){
                echo "no cambia salario";
            }else if($currentSalary>1000 && $currentSalary<2000){
                if($age>45){
                    $currentSalary=$currentSalary + $currentSalary*0.10;
                }else $currentSalary=$currentSalary + $currentSalary*0.04;

            }else{
                if($age<30){
                    $currentSalary=$currentSalary + $currentSalary*0.10;
                }else if($age<45){
                    $currentSalary=$currentSalary + $currentSalary*0.03;
                }else{
                    $currentSalary=$currentSalary + $currentSalary*0.15;
                }
            };
            $personalInfo["CE2134"]["salario"]=$currentSalary;
            echo "<p>".$name."</p>";
            echo "<p>".$currentSalary."</p>";
            echo "<p>".$age."</p>";

        }


        
    ?>
</body>
</html>
