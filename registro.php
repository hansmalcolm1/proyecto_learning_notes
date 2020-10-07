<?php
	include ('database.php');
	include ('Usuario.php');

	session_start();

	if(isset($_GET['cerrar_session'])){
		session_unset();

		session_destroy();
	}

	if(isset($_SESSION['rol'])){
		switch($_SESSION['rol']){
			case 1:
				header('location: inicioAdmin.php');
			break;

			case 2:
				header('location: inicio.php');
			break;

			default:
		}
	}

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = hash('sha256', $password);
		$db = new Database();
		$query = $db->connect()->prepare('INSERT INTO usuarios (usuario, password, rol_id) values (:usuario, :password, 2)');
		$query->execute(['usuario' => $username, 'password' => $password2]);

		
		$rol = 2;
			
		switch ($rol) {
			case 1:
				header('Location: inicioAdmin.php');
				break;

			case 2:
				header('location: inicio.php');
				break;
				
			default:
					
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<form action="#" method="POST">
		Username: <br><input type="text" name="username"><br>
		Password: <br><input type="password" name="password"><br>
		<input type="submit" value="Registrarse">
	</form>
</body>
</html>