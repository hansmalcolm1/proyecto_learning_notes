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
		$query = $db->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
		$query->execute(['usuario' => $username, 'password' => $password2]);

		$row = $query->fetch(PDO::FETCH_NUM);
		
		if($row == true){
			$rol = $row[3];
			$_SESSION['rol'] = $rol;
			
			switch ($_SESSION['rol']) {
				case 1:
					header('Location: inicioAdmin.php');
					break;

				case 2:
					header('location: inicio.php');
					break;
				
				default:
					
			}
		}else{
			echo "El usuario o contraseña son incorrectos";
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
		<input type="submit" value="Iniciar sesión">
	</form>
	<button><a href="registro.php">Registrarse</a></button>
</body>
</html>