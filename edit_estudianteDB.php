<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["id_alumno"]) && strlen($_GET["id_alumno"])){
	$id_alumno=$_GET["id_alumno"];
	$sql = "select * from estudiante where id_alumno=:id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":id_alumno", $id_alumno);
	$result->execute();
	$p = $result->fetchObject("Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_estudianteDB.php" method="POST">
				<table>
					<tr>
						<td>Id alumno</td>
						<td><input type="number" name="id_alumno" value="<?=$p->id_alumno;?>" readonly/></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type="text" name="nom_alumno" value="<?=$p->nom_alumno;?>"/></td>
					</tr>
					<tr>
						<td>Documento</td>
						<td><input type="number" name="documento" value="<?=$p->documento;?>"/></td>
					</tr>
					<tr>
						<td>Celular</td>
						<td><input type="number" name="celular" value="<?=$p->celular;?>"/></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" value="<?=$p->email;?>"/></td>
					</tr>
					<tr>
						<td>Fecha de nacimiento</td>
						<td><input type="date" name="fecha_nacimiento" value="<?=$p->fecha_nacimiento;?>"/></td>
					</tr>
					<tr>
						<td>Dirección</td>
						<td><input type="text" name="direccion" value="<?=$p->direccion;?>"/></td>
					</tr>
					<tr>
						<td>Teléfono fijo</td>
						<td><input type="number" name="telefono_fijo" value="<?=$p->telefono_fijo;?>"/></td>
					</tr>
					<tr>
						<td><input type="submit" value="Guardar" /></td>
					</tr>
				</table>
			</form>
		</body>
		</html>
		<?php

}
else{
	echo "<script>alert('El id alumno no es valido');
	window.location.href='ListarEstudiantesDB.php'</script>";
}
?>
