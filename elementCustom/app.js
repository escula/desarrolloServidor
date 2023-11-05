
const template = document.createElement("template");
template.innerHTML=/*template*/
`
<style>
    h3:{color:green}
</style>    
<h3>HOla pan tumaca</h3>
<form>
    <input type="checkbox"/>
    <label>cambbia solo</label>
</form>

<slot></slot>
<!--De este tipo slot solo puede haber uno-->

<p class="description"><slot name="gustavo"></slot></p>

`



class todoItem extends HTMLElement{
    // <input type="text">
    constructor(){
        super();
        // const atributoColor=this.getAttribute("color");
        // console.log(atributoColor);
        // template.querySelector('h3').innerText= (atributoColor);
        
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
    disconnectedCallback(){//Cuando el elemento todo-item se añade al dom
        console.log("desconectado")
        this.shadowRoot.innerHTML=""

    }


    actualizarCheck(valor){
        this.elementCheck.checked=valor !=null && valor != "false";
    }

    // connectedCallback(){
    //     // this.setAttribute("checked"=>!)
    // }
    

}

customElements.define("todo-item",todoItem);

const item =document.querySelector("todo-item");
let checked=true
let contador=0;
setInterval(()=>{
    checked = !checked
    item.setAttribute("checked",checked)
    contador++;
    if(contador>5) item.remove();
},500)

// class todoItem extends HTMLElement{
//     constructor(){
//         super()
//         const shadow=this.attachShadow({mode: "open"});
//         shadow.append(this.innerHTML =`<h3><slot>${this.innerText}<slot></h3>`);
        
//     }
    
// }

// customElements.define("todo-item",todoItem);