// Inicialización de variables
const campoNumero = document.querySelector("#numero");
const botonEnviar = document.querySelector("#enviar");
const mensIntentos = document.querySelector(".mensIntentos");
const mensResultado = document.querySelector(".mensResultado");
const mensMayMen = document.querySelector(".mensMayMen")

let numAleatorio = Math.floor(Math.random() * 100) + 1;   // Genera un número aleatorio entre 1 y 100
console.log(numAleatorio);   // para comprobar el valor

let numIntento = 1;   // Registra el número del intento en el que el jugador se encuentra, empezando en 1

let numUsuario;   // Da al jugador una forma de adivinar cuál es el número

// Una vez que se ha introducido un número, se registra en alguna parte para que el jugador pueda ver sus intentos previos
let listaIntentos = "";

// Funcion de recogida de numero
function enviar() {
    numUsuario = numero.value;   // capturo el número del usuario
    listaIntentos += numUsuario + " ";   // compongo la lista de intentos

    if (numAleatorio == numUsuario) {
        mensResultado.innerHTML = "Has acertado";
        mensResultado.style.backgroundColor = "green";
        mensResultado.style.color = "white";
        campoNumero.disabled = true;
        botonEnviar.disabled = true;
    } else {
        if (numAleatorio > numUsuario) {
            mensMayMen.innerHTML = "Numero bajo";
        } else {
            mensMayMen.innerHTML = "Numero alto";
        }
        if (numIntento <= 10) {   // fallo con intentos disponibles 
            mensResultado.innerHTML = "Has fallado. Intentalo de nuevo";
            mensResultado.style.backgroundColor = "red";
            mensResultado.style.color = "white";
            mensIntentos.innerHTML = listaIntentos;
            numIntento++;
        } else {   // fallo sin mas intentos
            mensResultado.innerHTML = "Has fallado. Fin de la partida";
            mensResultado.style.backgroundColor = "black";
            mensResultado.style.color = "white";
            campoNumero.disabled = true;
            botonEnviar.disabled = true;
        }
    }
}