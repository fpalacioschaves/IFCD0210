function ordenar(){
    orden = document.getElementById("ordenar").value;

    var ajax_url = "./reordenar.php"; // ruta del archivo php que será lanzado

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tabla_cines").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?orden=" + orden);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();
}

function reordenar_titulo(){

    orden = document.getElementById("titulo").dataset.orden;

    var ajax_url = "./reordenar.php"; // ruta del archivo php que será lanzado

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tabla_cines").innerHTML = response;

            if(orden == "ASC"){
                new_orden = "DESC";
            }
            else{
                new_orden = "ASC";
            }
            document.getElementById("titulo").dataset.orden = new_orden;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?orden=" + orden);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function reordenar_rating(){

    orden = document.getElementById("rating").dataset.orden;

    var ajax_url = "./reordenar_rating.php"; // ruta del archivo php que será lanzado

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tabla_cines").innerHTML = response;

            if(orden == "ASC"){
                new_orden = "DESC";
            }
            else{
                new_orden = "ASC";
            }
            document.getElementById("rating").dataset.orden = new_orden;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?orden=" + orden);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}

function filtrar(){

    filtro = document.getElementById("filtro").value;

    var ajax_url = "./filtrar.php"; // ruta del archivo php que será lanzado

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tabla_cines").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro);
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();

}