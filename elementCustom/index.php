<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="app.js"></script>
    <script defer>
        function pulsar(){
            if(document.querySelector("input").checked){
                console.log("estaba marcado")
                document.querySelector("input").checked="";
                // document.querySelector("input").
            }else{
                console.log("estaba desmarcado marcado")
                document.querySelector("input").checked="true";
            }

        }
        
    </script>
    <!-- defer espera a que cargue el dom tambien se puede usar async -->
</head>
<body>
    <todo-item checked>hola eu haces
        <p slot="gustavo">aaaaa</p>
    </todo-item>
    <input type="checkbox">
    <button onclick="pulsar()">
        asas
    </button >
    
</body>

</html>
