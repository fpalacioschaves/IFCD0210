// n es el numero a adivinar entre 1 y 20
let n = Math.floor(Math.random() * 20)+1;
console.log(n);
// r es un valor para comprobar si sigo jugando
let r = true;

while (r == true) {
    // p es el numero solicitado
    p = prompt("Adivina un numero entre 1 y 20");

    // compruebo si p esta entre 1 y 20
    if (p >= 1 && p <= 20) {
        // juego
        if (p > n) {
            alert(n + " es mas bajo que " + p);
        } else if (p < n) {
            alert("n es mas alto");
        } else {
            alert("Has acertado");
            r = false;
        }
    } else if (p < 0) {
        // si p<0 (negativo), termina el juego
        alert("Fin del juego");
        r = false;
    } else {
        // si p==0 o p>20, numero no valido
        alert("Numero no valido");
    }
}