 //Envia al servidor la tabla y recibe por text la html que se debe inyectar a su vez lo inyecta en el sitio adecuado

 let nombreTablaPulsada="";
 listaTablas=document.querySelectorAll('aside ul li');
 listaTablas.forEach(tablaNombre => {
    tablaNombre.onclick=tablaPulsada;
 });

function tablaPulsada(objEvento){
    let etiquetaConClaseTablaPulsada=document.getElementsByClassName("tablaPulsada");
    if(etiquetaConClaseTablaPulsada.length>0){//Tendria que haber solo una pero habriendo el inspector puedes añadir tu la clase manualmente, para borrar todas las clases relizamos un bucle for para eliminar todas las eituqetas con esa clase
        for (const etiquetaConTablaPulsada of etiquetaConClaseTablaPulsada) {
            etiquetaConTablaPulsada.classList.remove("tablaPulsada")
            
        }
    }

    let etiquetaPulsada=objEvento.currentTarget;
    etiquetaPulsada.classList.add("tablaPulsada");
    let nombreTabla=etiquetaPulsada.innerText;
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
    .catch(function(segundoError){//captura el throw lanzado en el primer then
        console.log(segundoError);
    });
}

function anadirFila(){
    let datosAEnviarAlBorrar= new FormData();
    datosAEnviarAlBorrar.append('nombreTabla',document.getElementsByClassName('tablaPulsada')[0].textContent);

    fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/anadirFila.php',{
        method:'POST',
        body:datosAEnviarAlBorrar
    }).then((respuesta)=>{
        if(respuesta.ok){
            return respuesta.json();

        }else{
            throw "error en la llamada";
        }
    }).then(function(responseComprobada){
        console.log(responseComprobada);
        let cuerpoTabla=document.querySelector('tbody');
        let nuevaFila=document.createElement("tr");
        nuevaFila.innerHTML=responseComprobada.filaEnTabla;
        cuerpoTabla.prepend(nuevaFila);
        document.getElementsByClassName("anadir-icono-para-insert")[0].remove();
        document.querySelector('main').innerHTML=responseComprobada.nuevoIcono+document.querySelector('main').innerHTML ;
        document.getElementById('insertarTabla').setAttribute("value",nombreTablaPulsada);
    }).catch(function (e){
        console.log(e);
    });
    
    
    // // let numeroDeColumnas=document.querySelectorAll('tbody tr:first-child td').length;
    // // for (let index = 0; index < numeroDeColumnas.length; index++) {
        // //     let td=document.createElement("td");
        // //     td.innerHTML='<input type="">';
        // //     nuevaFila.appendChild(td);
        
        // // }
}

function enviarFila(){
    document.getElementById("formulario").addEventListener('submit',function(evento) {
        evento.preventDefault();//evita que el navegador haga las acciones por defecto que tiene cuando ejecutas ese evento
        
        var datosEnviar=new FormData(this);
        fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/anadirFila.php',{
            method:'POST',
            body:datosEnviar
        }).then(response=>{
            if(response.ok){
                return response.text();
    
            }else{
                throw "error en la llamada";
            }
        })
        .then(respuestaServidor=>{
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
        .catch(error=>console.log(error))
        
    });

    // let data = {nombre: "Juan", edad: 30};
        
    //     fetch("./servidor.php", {
    //       method: 'POST', 
    //       headers: {
    //         'Content-Type': 'application/json',
    //       },
    //       body: JSON.stringify(data), 
    //     })
    //     .then(response => response.json())
    //     .then(data => console.log('Éxito:', data))
    //     .catch((error) => console.error('Error:', error));
}