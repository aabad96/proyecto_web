//Funcion encargada efecto de oscurecer y mostrar menu
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

//Funcion encargada ascension con el tiempo de subida
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
    }
	else{
		document.getElementById("contenidoFin").innerHTML = '<h1>Buscando...</h1>';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			var response = JSON.parse( xmlhttp.responseText );
			console.log(response);
            var output = "<h1>" + "EXTENSIONES QUE CONTIENEN: " + busqueda.toUpperCase() + "</h1>";
            //recorremos cada extension
			if (typeof response != "undefined" && response != null && response.length != null && response.length > 0){
				var aux = 0;
				for (extension in response ) {
					output += '<div class="extension">'
					output += "<h2>."+response[aux].nombre + "</h2>";
					output += "<p>" + response[aux].descripcion + "</p>";
					output += "<span>" + response[aux].nombre_programa + "</span>";
					output += '<p><a target="_blank" href="' + response[aux].link  + '">Descargar '+response[aux].nombre_programa+'</a></p>';
					output += '</div>';
					output += '<div class="line"></div>';
					aux+=1;
				}
			}
			else{
				output = "<h2>" + "NINGUNA EXTENSIÓN CONTIENE " + busqueda.toUpperCase() + "...</h2>";
		}
		//Actualizamos el HTML del elemento con id="#contenidoFin"
            document.getElementById("contenidoFin").innerHTML = output;
		}
		}}
    xmlhttp.open("GET", "php/jsonExtensionNombre.php?name=" + busqueda, true);
    xmlhttp.send();
}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
