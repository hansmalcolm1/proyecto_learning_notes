<?php
	include ('database.php');
	include ('Usuario.php');

	session_start();

	if(isset($_GET['cerrar_session'])){
		session_unset();

		session_destroy();
	}

	if(isset($_SESSION['rol'])){
		$_SESSION['username'] = $username;
		$_SESSION['rol'] = $rol;
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
		$password2 = md5($password);
		$db = new Database();
		$query = $db->connect()->prepare('INSERT INTO usuarios (usuario, password, rol_id) values (:usuario, :password, 2)');
		$query->execute(['usuario' => $username, 'password' => $password2]);

		
		$rol = 2;
		$_SESSION['username'] = $username;
		$_SESSION['rol'] = $rol;
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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<style>
    body { background-color:lightgreen; }
  </style>

</head>

<body>
<br><br>

	<form action="#" method="POST">
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
  


		Username: <br><input type="text" name="username"><br>
		Password: <br><input type="password" name="password"><br>
		<input class="btn btn-primary" type="submit" value="Registrarse">

</div>
	</form>


</body>
</html>