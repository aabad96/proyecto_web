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
function find_user_by_username($email, $password, $connection) {


		$safe_email = mysqli_real_escape_string($connection, $email);


		$query  = "SELECT * ";
		$query .= "FROM usuario ";
		$query .= "WHERE email = '$email'";
		//echo "$query <br>";
		$user_set = mysqli_query($connection, $query);
		if (!$user_set) {
			die("Database query failed.");
		}



		if($user = mysqli_fetch_row($user_set)) {
			return $user;
		} else {
			return null;
		}
	}

function attempt_login($email, $password, $connection) {
		$user = find_user_by_username($email,$password, $connection);
		if ($user) {
				$codigo= $user[2];
			if (password_verify($password, $codigo)){
				return true;
			} else {
				return false;
			}


		}

}



?>
<?php
if(isset($_POST['email'])) {
	$email = $_POST['email'];
}
if(isset($_POST['pass'])) {
	$password = $_POST['pass'];
	//echo "Contraseña recogida: ".$password;
}


$found_user = attempt_login($email, "".$password, $connection);
if($found_user){
	  echo '<script>
                alert("Bienvenido de nuevo '.$email.'");
                window.location= "../index.html"
    </script>';
} else {
	 echo "<script>
                alert('Usuario o contraseña incorrectos');
                window.location= '../index.html'
    </script>";
}
?>


<?php
  // 5. Close database connection
  mysqli_close($connection);
?>
