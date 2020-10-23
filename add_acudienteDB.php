<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from estudiante";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	</head>
	<body>

	<br><br>
		<form action="guardar_acudienteDB.php" method="POST">

		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

			<table>
				<tr>
					<td>Documento</td>
					<td><input type="number" name="documento" /></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nombre" /></td>
				</tr>
				<tr>
					<td>Parentesco</td>
					<td><input type="text" name="parentesco" /></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="direccion" /></td>
				</tr>
				<tr>
					<td>Teléfono</td>
					<td><input type="number" name="telefono" /></td>
				</tr>
				<tr>
					<td>Estudiante</td>
					<td>
						<select name="estudiante_id_alumno">
						<?php
						foreach($personas as $p){
							?>
							<option value="<?=$p->id_alumno;?>"><?=$p->nom_alumno;?></option>
							<?php
						}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
