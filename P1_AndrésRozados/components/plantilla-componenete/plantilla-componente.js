
const template = document.createElement("template");
template.innerHTML=/*template*/
`
<slot></slot>
<!--De este tipo slot solo puede haber uno-->
<p class="description"><slot name="gustavo"></slot></p>
<!--En html:<todo-item checked>hola eu haces
        <p slot="gustavo">aaaaa</p>
    </todo-item>-->
`

class claseName extends HTMLElement{
    
    constructor(){
        super();
        const shadow=this.attachShadow({mode: "open"});
        shadow.append(template.content.cloneNode(true));
        this.elementCheck=shadow.querySelector("input");
    }
    
    static get observedAttributes(){//listetener de los atributos si cambia lo refresca
        return ["checked"];
    }

    attributeChangedCallback(name,oldValue,newValue){//Cuando cambia un atributo lo detecta y se ejecuta esta funcion por parametro se deveulve el nombre del atributo la su antiguo valor y el nuevo. recorreo solo el array
        console.log(name,oldValue,newValue)     
        if(name==="checked"){
            this.actualizarCheck(newValue);
        }
        
    };

    connectedCallback(){//Cuando el elemento todo-item se añade al dom
        console.log("conectado")
    }
    disconnectedCallback(){//Cuando el elemento todo-item se elimina del dom al dom
        console.log("desconectado")
        this.shadowRoot.innerHTML=""

    }
}


customElements.define("nombre-custom-element",claseName);
