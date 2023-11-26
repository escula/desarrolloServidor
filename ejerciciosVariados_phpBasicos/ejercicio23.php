<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body div{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin:0px 2px;
            & div{
                display: flex;
                flex-direction: column;
                font-weight: 500;
                font-size:20px;
                
            }
        }
        .verde{
            color:green;
            text-align: center;
            
        }
        .rojo{
            color:red;
            text-align: center;
        }
    </style>
</head>
<?php
    echo('<pre>');
    $randomNumers=[];
    generarNumeros();
    imprimirIndiceYnumerosAleatorios();
    imprimirNumeroDeVecesSeRepite();
    
    
    function generarNumeros(){
        global $randomNumers;
        for ($i=0; $i < 20; $i++) { 
            do{      
                $number=random_int(1,30);
            }while(inArray($number));
            array_push($randomNumers,array('numeroAleatorio'=>$number,'repeticiones'=>1));
        }
        array_multisort($randomNumers,SORT_ASC);
    }
    
    
    //Comprueba si ya se han generado numeros duplicados, cuando se duplica cuenta los numeros que se repitan.
    //Devuelve true si el número esta duplicado sino false.
    function inArray($number):bool{
        global $randomNumers;
        $result=false;
        foreach ($randomNumers as &$miniArray) {
            if($miniArray['numeroAleatorio']==$number){// se pone if para que recorra todo el array
                $miniArray['repeticiones']=$miniArray['repeticiones']+1;
                return true;
            };
        }
        return $result;
    }

    function imprimirIndiceYnumerosAleatorios(){
        global $randomNumers;
        print('<div>');
        
            foreach ($randomNumers as $key => $miniArray) {
                if($miniArray['numeroAleatorio']%2){
                    print('<div class="rojo">');
                    print('<div>'.$key.'</div>');
                    print('<div>'.$miniArray['numeroAleatorio'].'</div>');
                    print('</div>');
                }else{
                    print('<div class="verde">');
                    print('<div>'.$key.'</div>');
                    print('<div>'.$miniArray['numeroAleatorio'].'</div>');
                    print('</div>');
                }


            }
        print('</div>');
    }
    function imprimirNumeroDeVecesSeRepite(){
        global $randomNumers;
        foreach ($randomNumers as $miniArray) {
                print('<p>El numero '.$miniArray['numeroAleatorio'].' se repite:'.$miniArray['repeticiones'].'</p>');

        }
    }
?>
<style>

</style>
<body>
    <div>

    </div>
</body>
