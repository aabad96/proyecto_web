<?php
	require('db.php');
	$count=1;
	$sel_query="Select * from extension order by id;";
	$result = mysqli_query($con,$sel_query);
	
	// Se va a generar un JSON con la la info:
	// [ {latitud:lat1, longitud:lon1}, ... {latitud:lat2, longitud:lon2}]
	
	$json = "[ "; // se deja espacio para que al quitar ?ltimo car?cter no rompa si no hay resultados
	while($row = mysqli_fetch_assoc($result)) { 
		$json = $json.'{"id":'.$row["id"].',"nombre":'.'"'.$row["nombre"].'"'.',
		"descripcion":'.'"'.$row["descripcion"].'"'.',"nombre_programa":'.'"'.$row["programa"].'"'.',"link":'.'"'.$row["link"].'"'.'
		,"idCategoria":'.$row["idCategoria"].'},'; 
	}
	$json = substr($json, 0, -1)."]"; // se quita la ?ltima coma y se cierra el array
	
	// se devuelve el resultado
	echo utf8_encode($json);
?>