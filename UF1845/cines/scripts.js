function ordenar(){
    orden = document.getElementById("ordenar").value;

    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // si el readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = ajax_request.responseText;
            document.getElementById("tbody_empresas").innerHTML = response;
        }
     }

     // Definimos como queremos realizar la comunicación
     ajax_request.open( "GET", ajax_url + "?filtro=" + filtro );
           
     //Enviamos la solictud con los parámetros que habíamos definido
     ajax_request.send();
}