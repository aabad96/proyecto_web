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
function find_user_by_username($email,  $connection) {
		$safe_email = mysqli_real_escape_string($connection, $email);
		$query  = "SELECT * ";
		$query .= "FROM usuario ";
		$query .= "WHERE email = '$email'";
		echo "$query <br>";
		$user_set = mysqli_query($connection, $query);
		if (!$user_set) {
			die("Database query failed.");
		}
		
		if($user = mysqli_fetch_assoc($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

function attempt_login($email, $connection) {
		$email = find_user_by_username($email, $connection);
		if ($email) {
			
			//user encontrado
			
			return $email;
    }
		 else {
			// user not found
			//echo "Usuario no encontrado";
			return false;
		}
	}
	
	
	
?>
<?php

if(isset($_POST['email'])) { 
    // check if the email has been set
	$email = $_POST["email"];
}

if(isset($_POST['pass'])) { 
    // check if the email has been set
	$password = $_POST["pass"];
}

$found_user = attempt_login($email, $connection);
$tablename ="usuario";
        $query  = "INSERT INTO `$tablename` (";
		$query .= "  `email`, `pass`";
		$query .= ") VALUES (";
		$query .= " '$email', '$password'";
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