export {template}

const template = document.createElement("template");
template.innerHTML=
`
<style>
:root{
    /* --modal:hsla(182, 100%, 69%, 1) */
    
    /* --main-background:hsla(176, 0%, 99%, 1); */
    --main-background:hsla(176, 0%, 99%, 1);
    --menu-background:hsla(176, 87%, 98%, 1);
    --input-background:rgb(255, 255, 255);
    --input-border:rgb(214, 214, 214);
}
*{
    all:unset;
}
style,head, title, audio { display: none; }

body{
    background-color: var(---main-background);

}
div,section,dialog{
    border-radius: 10%;

}
h1,h2,h3,h4,h5,h6,p{
    text-overflow: clip;
}
label{
    display: block;

}
label{
    
    font-size: 1.5em;
    border: 2px solid red;
    display:block;
}
form{
    height: auto;
    width:auto;
    overflow: hidden;
    padding: 0% 10%;
}
input{
    background-color: var(--input-background);
    width: 100%;
    height: 3em;
    border-radius:3em ;
    font-size: larger;
    border-style: none;
    padding: 0% 10%;

}
::placeholder {
    display: block;
    color: red;
    opacity: 1; /* Firefox */
  }
::-ms-input-placeholder { /* Edge 12 -18 */
display: block;
color: red;
}

section{
    height: 40vh;
    width: 40vh;
    background-color: var(--menu-background);
    display: flex;
    flex-wrap:wrap;
    box-sizing: border-box;
    padding:3vh;
    & form{
        width: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        & div{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            flex-grow: 2;
        }
        & header{
            display:flex;
            flex-flow:column nowrap;
            flex-grow: 3;
            flex-direction: column;
            justify-content: flex-end;


            

        }
    }
}
</style>
<section>
    <form action="">
        <div>
            <label >Usuario</label>
            <input class="entrada" type="text" placeholder="Paco Malano">
            <label >Contraseña</label>
            <input class="entrada" type="password"placeholder="almorranas">
        </div>
        

        <header>
            <button>Iniciar sesión</button></form>
        </header>
                

</section>
<slot></slot>
<!--De este tipo slot solo puede haber uno-->
<p class="description"><slot name="gustavo"></slot></p>
<!--En html:<todo-item checked>hola eu haces
        <p slot="gustavo">aaaaa</p>
    </todo-item>-->
`