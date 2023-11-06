export {template}

const template = document.createElement("template");
template.innerHTML=
`
<link href="../reseteo.css" rel="stylesheet" type="text/css">
<style>
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