<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modificarTodo.css">
    <script defer src="./moverBarraLateral.js"></script>
    <script defer>
        //Envia al servidor la tabla y recibe por text la html que se debe inyectar a su vez lo inyecta en el sitio adecuado
        let nombreTablaPulsada="";
        
        function tablaPulsada(nombreTabla){
            let datosAEnviar= new FormData();
            datosAEnviar.append('nombreTabla',nombreTabla);
            nombreTablaPulsada=nombreTabla;
            
            let request=fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/obtenerTabla.php',{
                method:'POST',
                body:datosAEnviar//Enviamos al servidor
            }).
            then(function(response){//info que recive del server
                if(response.ok){
                    // return response.json();
                    return response.text();

                }else{
                    throw "error en la llamada";
                }
                
            })
            .then(function(respuestaServidor){
                console.log(respuestaServidor);
                let elementoMain=document.querySelector('main');
                elementoMain.innerHTML=respuestaServidor;//Se mete a capon el html que nos viene del servidor
                // createNode
                // elementoMain.createElement("")
                let botonesBorrar=document.getElementsByClassName('borrarFila');
                for (let indiceBotonBorrar = 0; indiceBotonBorrar < botonesBorrar.length; indiceBotonBorrar++) {
                    botonesBorrar[indiceBotonBorrar].addEventListener("mousedown",pulsarBotonBorrar);
                   
                }
            })                    
            .catch(function(error){//captura el throw lanzado en el primer then
                console.log(error);
            });
        }
        function pulsarBotonBorrar(objetoEvento) {
            let filaAborrar=objetoEvento.currentTarget.parentNode.parentNode;
            let idFila=filaAborrar.childNodes[0].innerHTML;//recogemos el id que simpre se encuentra en el primer td
            let nombreColumnaID=document.querySelector('thead tr th').textContent;
            

            let datosAEnviarAlBorrar= new FormData();

            datosAEnviarAlBorrar.append('nombreTabla',nombreTablaPulsada);
            datosAEnviarAlBorrar.append('nombreColumnaID',nombreColumnaID);
            datosAEnviarAlBorrar.append('idABorrar',idFila);

            console.log(datosAEnviarAlBorrar);
            let request=fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/borrarFila.php',{
                method:'POST',
                body:datosAEnviarAlBorrar//Enviamos al servidor
            }).
            then(function(respuesta){//info que recive del server
                
                if(respuesta.ok){
                    return respuesta.json();

                }else{
                    throw "error en la llamada";
                }
                
            })
            .then(function(respuestaServidor){
       
                console.log(respuestaServidor)
                
                const modal=document.getElementById('modalConfirmacion');
                modal.firstElementChild.innerHTML=respuestaServidor.mensajePopUp;
                
                if(respuestaServidor.tipoModal=="modalCorrecto"){ 

                    modal.style.backgroundColor="lightgreen";
                    filaAborrar.remove();
                }else{
                    modal.style.backgroundColor="lightcoral";
                }
                modal.style.opacity="1"//Aparece el modal
                setTimeout(() => {//Se desbanece solo el modal
                        modal.style.opacity="0"
                    }, 2000);
                
                
            })
            // .catch(function(segundoError){//captura el throw lanzado en el primer then
            //     console.log(segundoError);
            //     console.log("hola")
            // });
        }
        
        // function borrarFila(numeroFila){
        //     // numeroFila el numeroFila empieza desde cero por lo que hay que sumarle uno para que no tenga el cuenta el tr del head
        //     let todasLasFilas=document.querySelectorAll('tr');
        //     let filaAborrar=todasLasFilas[numeroFila+1];
        //     let idFila=filaAborrar.childNodes[0].innerHTML;//recogemos el id que simpre se encuentra en el primer td
        //     let nombreColumnaID=document.querySelector('thead tr th').textContent;
            
        //     console.log(nombreColumnaID);

        //     let datosAEnviar= new FormData();
       
        //     datosAEnviar.append('nombreTabla',nombreTablaPulsada);
        //     datosAEnviar.append('nombreColumnaID',nombreColumnaID);
        //     datosAEnviar.append('idABorrar',idFila);
            
        //     let request=fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/modificarTodoControlador.php',{
        //         method:'POST',
        //         body:datosAEnviar//Enviamos al servidor
        //     }).
        //     then(function(response){//info que recive del server
        //         if(response.ok){
        //             // return response.json();
        //             return response.text();

        //         }else{
        //             throw "error en la llamada";
        //         }
                
        //     })
        //     .then(function(respuestaServidor){
        //         if(respuestaServidor){
        //             filaAborrar.remove()
        //         }
                
                
        //     })
        //     .catch(function(error){//captura el throw lanzado en el primer then
        //         console.log(error);
        //     });

        // }

    </script>
</head>
<body class="grid-principal">
    
    <header>
        <nav>
            <ul>
                <li><?=$_COOKIE["funcionEmpleado"]?? "error No ha cardado cookie"?></li>
                <li class="salir"><a href="../../controller/login/loginControlador.php"><img src="./../../assets/exit.svg" alt="salir"></a></li>
            </ul>
        </nav>    
    </header>
    <aside>
        <ul>
            <?php
                include_once '../../constants/usuariosPrivilegios.php';

                if(isset($_COOKIE["funcionEmpleado"])){
                    $funcionEmpleadoIniciadaSesion=$_COOKIE["funcionEmpleado"];
                    
                    $tablasConPermisosDeAcceso=$privilegios[$funcionEmpleadoIniciadaSesion];
                    foreach ($tablasConPermisosDeAcceso as $key=>$value) {
                        echo '<li onclick="tablaPulsada(\''.$value.'\')">'.$value.'</li>';

                }
                };
                
                
            ?>
            
        </ul>
        <hr id="delimitador-0">

    </aside>
    <main>
        <div class="modal-inicial">
            <p>Selecciona alguna tabla en el menu lateral</p>
        <div>
        <!-- style="display:block;height: 50px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cupiditate, in quidem repellat magni consectetur adipisci neque nulla quae velit.</div> -->
    </main>
    <display id="modalConfirmacion" class="modal">
        <p>Mensaje del modal Lorem*3</p>
    </display>
</body>

</html>