let caca=document.getElementsByClassName("clicado");
document.querySelector("hr")
let hr=document.querySelector("hr");
let hrs=document.querySelectorAll("hr");
hrs.forEach(element => {


element.addEventListener("mousedown", function (evento){
    evento.currentTarget.classList.add('clicado');
    document.querySelector('body').classList.add('col-resize');
    document.addEventListener('mousemove', moverRaton);//Para coger el objeto de tipò Event es necesario que no tenga parametro la funcion moverRaton
    
    
    
});
document.addEventListener('mouseup', function(event){
    document.removeEventListener('mousemove', moverRaton);
    document.querySelector('body').classList.remove('col-resize');
    element.classList.remove('clicado')
});
});

function moverRaton(e) {
    let posicionRatonRespectoWindows = e.clientX;
    
    let hrPulsado=document.querySelector('.clicado');
    let numeroIdHrPulsado=hrPulsado.id.split("-")[1];//Se puede hacer también con un querySelectorAll('hr') y revisando con un bucle que hr tiene la clase, pero de esta forma me veo forzado a hacer un bucle
    let padreHrPulsado=hrPulsado.parentElement;
    let padreCordenadas=padreHrPulsado.getBoundingClientRect();//Obteniendo cordenadas del grid


    let grid=document.getElementsByClassName('grid-principal')[0];
    console.log(grid);
    let contendorEstilos=getComputedStyle(grid);
    let gridTemplateColumn=contendorEstilos.getPropertyValue("grid-template-columns");
    let tamanosColumnas=gridTemplateColumn.split(" ");//Contiene Ej: [delimitador-0,delimitador-1,ect]

    nuevoTamanoColumna=parseInt(posicionRatonRespectoWindows)-padreCordenadas.left;
    if(nuevoTamanoColumna>250){//Si se llega al tope de pixeles 

    }else if(nuevoTamanoColumna<100){

    }else{
        tamanosColumnas[numeroIdHrPulsado]=nuevoTamanoColumna+"px";
        tamanosColumnas[1]="1fr";//Reescribiendo a 1fr la segunda columna para que se muestre correctamente el main
        
        let resultado="";
        tamanosColumnas.forEach(columnaValor => {
            resultado=resultado+columnaValor+" ";
        });
        console.log(tamanosColumnas);
        console.log(resultado);
        grid.style.gridTemplateColumns=resultado;
    }
    
    

    
    
}