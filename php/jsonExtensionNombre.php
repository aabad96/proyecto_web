<?php
    if( isset($_GET['name']) ) {
    	obtenerExtensiones($_GET['name']);
    } else {
    	die("Solicitud no válida.");
    }
	function obtenerExtensiones($name){
	 //Cambia por los detalles de tu base datos
	$dbserver = "18.191.39.0";
	$dbuser = "publico";
	$password = "1234";
	$dbname = "proyectoWeb";

        $con = new mysqli($dbserver, $dbuser, $password, $dbname);

	if($con->connect_errno) {
                die("No se pudo conectar a la base de datos");
	}
	strtoupper($name);
	$sel_query="Select * from extension where nombre like '%$name%' order by nombre";
	$result = mysqli_query($con,$sel_query);

	// Se va a generar un JSON con la la info:

	$json = "[ "; // se deja espacio para que al quitar ?ltimo car?cter no rompa si no hay resultados
	while($row = mysqli_fetch_assoc($result)) {
		$json = $json.'{"id":'.$row["id"].',"nombre":'.'"'.$row["nombre"].'"'.',
		"descripcion":'.'"'.$row["descripcion"].'"'.',"nombre_programa":'.'"'.$row["programa"].'"'.',"link":'.'"'.$row["link"].'"'.'
		,"idCategoria":'.$row["idCategoria"].'},';
	}
	$json = substr($json, 0, -1)."]"; // se quita la ?ltima coma y se cierra el array

	// se devuelve el resultado
	echo utf8_encode($json);
	$con->close();
	}

	exit();
?>