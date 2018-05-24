<?php
	require('db.php');
	$count=1;
	$sel_query="Select * from programa order by id;";
	$result = mysqli_query($con,$sel_query);
	
	// Se va a generar un JSON 
	
	$json = "[ "; // se deja espacio para que al quitar ?ltimo car?cter no rompa si no hay resultados
	while($row = mysqli_fetch_assoc($result)) { 
		$json = $json.'{"id":'.$row["id"].',"nombre":'.'"'.$row["nombre"].'"'.'},'; 
	}
	$json = substr($json, 0, -1)."]"; // se quita la ?ltima coma y se cierra el array
	
	// se devuelve el resultado
	echo utf8_encode($json);
?>