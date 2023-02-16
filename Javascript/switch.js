hoy = new Date().getDay();

hoy += 0;   // hoy mas 2 dias

switch(hoy) {
    case 1: dia = "Lunes"; break;
    case 2: dia = "Martes"; break;
    case 3: dia = "Miercoles"; break;
    case 4: dia = "Jueves"; break;
    case 5: dia = "Viernes"; break;
    case 6: dia = "Sabado"; break;
    case 0: dia = "Domingo"; break;
    default: dia = "Error: dia no valido";
}
document.write(dia+"<br>");

switch(hoy) {
    case 1: 
    case 2:
    case 3:
    case 4:
    case 5: document.writeln("dia laborable"); break;
    case 6:
    case 0: document.writeln("dia festivo"); break;
    default: document.writeln("Error: dia no valido");
}
