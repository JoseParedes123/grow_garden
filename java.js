let tiempomax = 7200;
let tiempototal = 7200;

function actualizar(){
    let horas = Math.floor(tiempototal / 3600);
    let minutos = Math.floor((tiempototal % 3600) / 60);
    let segundos = tiempototal % 60;

    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;

    document.getElementById("contador").textContent =
    horas + ":" + minutos + ":" + segundos;

    actuimg();

}
setInterval(() =>{
    if (tiempototal>0){
        tiempototal--;
        actualizar();
    }
},1000);

function regar(){
    tiempototal -=60;
    if (tiempototal < 0) tiempototal = 0; 
    actualizar();
}

actualizar();

function actuimg(){
  
    

    let porcentaje = (tiempototal / tiempomax) * 100;

    if (porcentaje > 80) {
        document.getElementById("planta").src = "diseños/nivel1.png";
    }
      else if (porcentaje > 60 ) {
        document.getElementById("planta").src = "diseños/nivel2.png";
    }
      else if (porcentaje > 40) {
        document.getElementById("planta").src = "diseños/nivel3.png";
    }
     else  if (porcentaje > 20) {
        document.getElementById("planta").src = "diseños/nivel4.png";
    }
    else  {
        document.getElementById("planta").src = "diseños/nivel5.png";
    }
    }
actualizar();


   
