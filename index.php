<?php
	include ('database.php');
	include ('Usuario.php');



	session_start();

	if(isset($_SESSION['rol'])){
		switch($_SESSION['rol']){
			case 1:
				header('location: inicioAdmin.php');
			break;

			case 2:
				header('location: inicio.php');
			break;

			case 3:
				header('location: inicioDocente.php');
			break;
			default:
		}
	}

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = md5($password);
		$db = new Database();
		$query = $db->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
		$query->execute(['usuario' => $username, 'password' => $password2]);
		$row = $query->fetch(PDO::FETCH_OBJ);
		if($row==true){
		$contador = $row->contador;
		}
		if($row == true){
			if($contador==1){
			$rol = $row->rol_id;
			$_SESSION['sesion'] = $username;
			$_SESSION['rol'] = $rol;
			
			switch ($_SESSION['rol']) {
				case 1:
					header("Location: inicioAdmin.php?sesion=$username&rol=$rol");
					break;

				case 2:
					header("location: inicio.php?sesion=$username&rol=$rol");
					break;
				case 3:
					header("location: inicioDocente.php?sesion=$username&rol=$rol");
					break;
				default:
					
			}
			}
			elseif($contador==0){
				$_SESSION['username'] = $username;
				header("Location: cambio_contraseña.php?username=$username");
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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	
		<br><br>
		
	<form action="#" method="POST">
	 
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
	
	
	Username: <br><input type="text" name="username"><br>
	Password: <br><input type="password" name="password"><br><br>
		

		<input class="btn btn-primary" type="submit" value="Iniciar sesión">
	</form>
	<br>
	<button><a href="registro.php">Registrarse</a></button>

</div>
</div>
</div>
</div>

</body>
</html>