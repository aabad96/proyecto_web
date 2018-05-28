$(document).ready(function () {
    $('#quitar, .oscurecer').on('click', function () {
        $('#barra').removeClass('active');
        $('.oscurecer').fadeOut();
    });

    $('#esconder').on('click', function () {
        $('#barra').addClass('active');
        $('.oscurecer').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

$(document).ready(function(){
    $('.ir-arriba').click(function () {
        $('body, html').animate({
            scrollTop:'0px'
        }, 300); //Determina el tiempo de subida
    });
    $(window).scroll(function () {
        if($(this).scrollTop() > 0){
            $('.ir-arriba').slideDown(300);
        }else{
            $('.ir-arriba').slideUp(300);
        }
    });
});

function buscar(busqueda) {
	console.log(busqueda);
    if (busqueda.length == 0) { 
		location.reload(true);
        document.getElementById("contenidoFin").innerHTML = "<h2>Nada encontrado</h2>";
    } 
	else{
		console.log("hola1");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			console.log("hola2");
			var response = JSON.parse( xmlhttp.responseText );
			console.log(response);
            var output = "<h1>" + "EXTENSIONES QUE CONTIENEN: " + busqueda.toUpperCase() + "</h1>";
            //recorremos cada extension
			if (response == null){
				output = "<h2>" + "NINGUNA EXTENSIÓN CONTIENE " + busqueda.toUpperCase() + "...</h2>";
			}
			else{
				var aux = 0;
				for (extension in response ) {
					output += '<div class="extension">'
					output += "<h2>."+response[aux].nombre + "</h2>";
					output += "<p>" + response[aux].descripcion + "</p>";
					output += "<span>" + response[aux].nombre_programa + "</span>";
					output += '<p><a target="_blank" href="' + response[aux].link  + '">Descargar '+response[aux].nombre_programa+'</a></p>';
					output += '</div>'
					aux+=1;
				}
		}}
            //Actualizamos el HTML del elemento con id="#response-container"
            document.getElementById("contenidoFin").innerHTML = output;
		}}
    xmlhttp.open("GET", "php/jsonExtensionNombre.php?name=" + busqueda, true);
    xmlhttp.send();
}