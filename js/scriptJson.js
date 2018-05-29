//getdeails será nuestra función para enviar la solicitud ajax
var obtenerDatos = function( id ){
    // Definimos la URL que vamos a solicitar via Ajax
    var ajax_url = "php/jsonExtension.php";

    // Definimos los parámetros que vamos a enviar
    // Debería trabajar en hacer esto un poco más limpio, de momento vale para hacer funcionar el ejemplo
    var params = id+1;

    //Añadimos los parámetros a la URL
    ajax_url += '?id=' + params;

    // Creamos un nuevo objeto encargado de la comunicación
    var ajax_request = new XMLHttpRequest();

    // Definimos una función a ejecutar cuándo la solicitud Ajax tiene alguna información
    ajax_request.onreadystatechange = function() {

        // see readyState es 4, proseguir
        if (ajax_request.readyState == 4 ) {

            // Analizaos el responseText que contendrá el JSON enviado desde el servidor
            var response = JSON.parse( ajax_request.responseText );

            var output = "<h1>" + "EXTENSIONES" + "</h1>";
            //recorremos cada extension
            var aux = 0;
            for (extension in response ) {
                output += '<div class="extension">'
                output += "<h2>."+response[aux].nombre + "</h2>";
                output += "<p>" + response[aux].descripcion + "</p>";
                output += "<span>" + response[aux].nombre_programa + "</span>";
                output += '<p><a target="_blank" href="' + response[aux].link  + '">Descargar '+response[aux].nombre_programa+'</a></p>';
                output += '</div>'
				output += '<div class="line"></div>';
                aux+=1;
            }

            //Actualizamos el HTML del elemento con id="#response-container"
            document.getElementById("contenidoFin").innerHTML = output;
        }
    }

    // Definimos como queremos realizar la comunicación
    ajax_request.open( "GET", ajax_url );

    //Enviamos la solictud con los parámetros que habíamos definido
    ajax_request.send();

};

$(document).ready(function () {
    $('#categorias li').click(function() {
        var index = $(this).index();
        obtenerDatos(index);
		$('#barra').removeClass('active');
        $('.oscurecer').fadeOut();
        $('#resultado').text("Buscando...");
        //alert('Index is: ' + index + ' and text is ' + text);
    });
});
