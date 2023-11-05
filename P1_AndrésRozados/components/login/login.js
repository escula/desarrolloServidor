import {template as templateLogin} from "./css+html.js";

class login extends HTMLElement{
    
    constructor(){
        super();
        const shadow=this.attachShadow({mode: "open"});
        shadow.append(templateLogin.content.cloneNode(true));
        this.elementCheck=shadow.querySelector("input");
    }
    
    static get observedAttributes(){//listetener de los atributos si cambia lo refresca
        return [];
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


customElements.define("login-display",login);
