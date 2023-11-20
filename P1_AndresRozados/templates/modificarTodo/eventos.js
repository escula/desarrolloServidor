 //Envia al servidor la tabla y recibe por text la html que se debe inyectar a su vez lo inyecta en el sitio adecuado

 var nombreTablaPulsada="";
 var modificandoLinea=false;
 listaTablas=document.querySelectorAll('aside ul li');
 listaTablas.forEach(tablaNombre => {
    tablaNombre.onclick=tablaPulsada;
});

function tablaPulsada(objEvento){
    modificandoLinea=false;//Para que si estas actualizando una talbla y sin acabar la actualización te cambias de tabla te deje en esa tabla realizar actualizaciones
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
        let botonesActualizar=document.getElementsByClassName('actualizaFila');
        for (let indiceBotones = 0; indiceBotones < botonesBorrar.length; indiceBotones++) {
            botonesBorrar[indiceBotones].addEventListener("mousedown",pulsarBotonBorrar);
            
            botonesActualizar[indiceBotones].addEventListener("mousedown",pulsarBotonActualizar);
           
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
    fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/borrarFila.php',{
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
function pulsarBotonActualizar(objetoEvento){
    let filaAactualizar=objetoEvento.currentTarget.parentNode.parentNode;
    let tds=filaAactualizar.childNodes;

    let valoresColumnas="";
    let separador="%;$.%&";//Hemos usado un separador tan rarro para que no haya problema con ningun texto y no se mezclen las columnas, cosa que pasaria si usasemos de separador una ,
    for (let index = 0; index < tds.length-2; index++) {//lo pasamos a un string con un separador especial para mandarlo a servidor
        valoresColumnas=valoresColumnas+tds[index].innerText+separador;
    }
    console.log("Cliente Antes"+valoresColumnas);
    valoresColumnas=valoresColumnas.slice(0,-separador.length)//le quitamos el ultimo separador
    console.log(valoresColumnas);

    // let idFila=filaAactualizar.childNodes[0].innerHTML;//recogemos el id que simpre se encuentra en el primer td
    let nombreColumnaID=document.querySelector('thead tr th').textContent;

    let datosAEnviarAlBorrar= new FormData();

    datosAEnviarAlBorrar.append('nombreTabla',nombreTablaPulsada);//Se obtiene de la variable generica
    datosAEnviarAlBorrar.append('valoresColumnas',valoresColumnas);//Aqui esta metido tambien el valor del id

    
    fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/actualizarFila.php',{
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
        if(modificandoLinea){
            const modal=document.getElementById('modalConfirmacion');
            modal.firstElementChild.innerHTML="No puedes realizar otra modificacion mientras estas en una";
            modal.style.backgroundColor="lightcoral";
            modal.style.opacity="1"//Aparece el modal
            setTimeout(() => {//Se desbanece solo el modal
                    modal.style.opacity="0"
                }, 2000);

        }else{
            modificandoLinea=true;
            let contenidoPrincipal=document.querySelector('main');
            // <section id="seccionActualizar" class="seccion-actualizar"></section>
            let seccionActualizar=document.createElement("section");
            seccionActualizar.setAttribute("id","seccionActualizar");
            seccionActualizar.setAttribute("class","seccion-actualizar");
            seccionActualizar.innerHTML=respuestaServidor.seccionActualizar;
            contenidoPrincipal.appendChild(seccionActualizar);

            //////////////Cuando clique en guardar modificacion
            document.getElementById('formulario-insertar').addEventListener('submit',function(eventoo) {
                eventoo.preventDefault();//evita que el navegador haga las acciones por defecto que tiene cuando ejecutas ese evento
                var datosEnviar=new FormData(this);
                fetch('http://localhost/exercices/P1_AndresRozados/controller/modificarTodo/actualizarEnBD.php',{
                    method:'POST',
                    body:datosEnviar
                })
                .then(response=>{
                    
                    if(response.ok){
                        return response.json();
            
                    }else{
                        throw "error en la llamada";
                    }
                })
                .then(respuestaSer=>{
                    console.log(respuestaSer)
                    const modal=document.getElementById('modalConfirmacion');
                    modal.firstElementChild.innerHTML=respuestaSer.mensajePopUp;
                    
                    if(respuestaSer.tipoModal=="modalCorrecto"){ 
                        modal.style.opacity="1";//Aparece el modal
                        modal.style.backgroundColor="lightgreen";
                        setTimeout(() => {//Se desbanece solo el modal
                            modal.style.opacity="0"
                        }, 2000);
                        modificandoLinea=false;
                        document.getElementById('formulario-insertar').remove();
                    }else{
                        modal.style.opacity="1";//Aparece el modal
                        setTimeout(() => {//Se desbanece solo el modal
                            modal.style.opacity="0"
                        }, 2000);
                    }

                    
                    
                })
                .catch(error=>console.log(error));
                
            });
        }
        
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
    })
    .catch(function (e){
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
                return response.json();
    
            }else{
                throw "error en la llamada";
            }
        })
        .then(respuestaServidor=>{
            // console.log(respuestaServidor)
            const modal=document.getElementById('modalConfirmacion');
            modal.firstElementChild.innerHTML=respuestaServidor.mensajePopUp;
            
            if(respuestaServidor.tipoModal=="modalCorrecto"){ 
    
                modal.style.backgroundColor="lightgreen";
                
                //Sustituyendo el disquete por el que genera el formulario
                document.getElementsByClassName('anadir-icono-para-insert')[0].innerHTML=respuestaServidor.botonInsertar;



                //duplicando una columna que no tiene formulairo para cambiarles los colores e insertarla en la tabla del front
                let valoresFila=[];
                tds=document.querySelectorAll('input');
                tds.forEach(cadaColumna => {
                    console.log(cadaColumna);
                    valoresFila.push(cadaColumna.value);
                });
                valoresFila.pop();//Borrando valor del input de tipo hidden
                
                let filaduplicada=document.querySelectorAll('tbody tr')[1].cloneNode(true);//clonar la segunda etiqueta tr dentro de tbody
                console.log(filaduplicada.childNodes)
                tdDuplicados=filaduplicada.childNodes;

                for (let index = 0; index < valoresFila.length; index++) {
                    tdDuplicados[index].innerHTML=valoresFila[index];
                    
                }
                filaduplicada.innerHTML=filaduplicada.innerHTML;

                
                document.querySelector('tbody').prepend(filaduplicada);
                
                
                modal.style.opacity="1"// si no ponenmos este modal aqui no aparecera ya que despues el evento muere junto con el form
                setTimeout(() => {
                        modal.style.opacity="0"
                }, 2000);


                //Eliminando el formulario, por lo tanto se elimina tambien el evento
                document.getElementById("formulario").parentElement.remove();

            }else{
                modal.style.backgroundColor="lightcoral";
            }
            modal.style.opacity="1"//Aparece el modal
            setTimeout(() => {//Se desbanece solo el modal
                    modal.style.opacity="0"
                }, 2000);
            
            

        })
        .catch(error=>console.log(error));
        
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