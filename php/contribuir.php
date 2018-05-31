<?php
	define("DB_SERVER", "18.191.39.0");
	define("DB_USER", "publico");
	define("DB_PASS", "1234");
	define("DB_NAME", "proyectoWeb");

  // 1. Crear conexión con la BBDD
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("La conexión con la BBDD ha fallado: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>

<?php
if(isset($_POST['nombre'])) { 
    // check if the username has been set
	$nombre = $_POST["nombre"];
}

if(isset($_POST['email'])) { 
    // check if the username has been set
	$email = $_POST["email"];
}
if(isset($_POST['tipo'])) { 
    // check if the username has been set
	$tipo = $_POST["tipo"];
}
if(isset($_POST['comentario'])) { 
    // check if the username has been set
	$comentario = $_POST["comentario"];
}


$tablename ="sugerencia";
        $query  = "INSERT INTO `$tablename` (";
		$query .= "  `email`, `tipo`,`comentario`, `nombre`";
		$query .= ") VALUES (";
		$query .= " '$email', '$tipo', '$comentario','$nombre'";
		$query .= ")";
		$result = mysqli_query($connection, $query);

			if ($result) {
				echo "Gracias por tu colaboración '$email'";
			} else {
				die("Database query failed. " . mysqli_error($connection));
	}
	
?>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>