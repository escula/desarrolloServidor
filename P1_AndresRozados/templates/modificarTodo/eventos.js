 //Envia al servidor la tabla y recibe por text la html que se debe inyectar a su vez lo inyecta en el sitio adecuado

 let nombreTablaPulsada="";
 listaTablas=document.querySelectorAll('aside ul li');
 listaTablas.forEach(tablaNombre => {
    tablaNombre.onclick=tablaPulsada;
 });

function tablaPulsada(objEvento){
    nombreTabla=objEvento.currentTarget.innerText;

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

}