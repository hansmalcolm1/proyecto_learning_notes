<?php
	require 'database.php';
	require 'Usuario.php';
	session_start();
	$username=$_GET['username'];
	
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
	$row = false;


	if(isset($_POST['username']) && strlen($_POST["username"])>0 && isset($_POST['password']) && strlen($_POST["password"])>0){
		if($row==false){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = md5($password);
		$contador = 1;
		$db = new Database();
		$query = $db->connect()->prepare('UPDATE usuarios set password=:password, contador=:contador where usuario=:usuario');
		$query->execute(['usuario' => $username, 'password' => $password2, 'contador' => $contador]);

		$db2 = new Database();
		$query2 = $db2->connect()->prepare('SELECT * from usuarios where usuario=:usuario');
		$query2->execute(['usuario' => $username]);
		$hallar = $query2->fetch(PDO::FETCH_OBJ);
		$rol = $hallar->rol_id;
		$_SESSION['username'] = $username;
		$_SESSION['rol'] = $rol;
		switch ($rol) {
			case 1:
				header('Location: inicioAdmin.php');
				break;

			case 2:
				header('location: inicio.php');
				break;

			case 3:
				header('location: inicioDocente.php');
				break;
				
			default:
					
		}
		}else{
			echo "el usuario ya existe";
		}
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cambio de contraseña</title>

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
  

<h1>Cambiar contraseña</h1>
		Username: <br><input type="text" name="username" value="<?=$username;?>" readonly><br>
		Password: <br><input type="password" name="password"><br>
		<input class="btn btn-primary" type="submit" value="Cambiar contraseña">

</div>
	</form>


</body>
</html>