<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from estudiante";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from tarea";
$result2 = $con->prepare($sql2);
$result2->execute();
$personas2 = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

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
		<form action="guardar_estudiante_has_tareaDB.php" method="POST">

		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
			<table>
				<tr>
					<td>Estudiante</td>
					<td><select name="estudiante_id_alumno">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->id_alumno;?>"><?=$p->nom_alumno;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Tarea</td>
					<td><select name="tarea_idtarea">
						<?php
					foreach($personas2 as $p2){
						?>
						<option value="<?=$p2->idtarea;?>"><?=$p2->titulo_tarea;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Nota</td>
					<td><input type="number" step="any" name="nota" /></td>
				</tr>
				<tr>
					<td>Observación</td>
					<td><input type="text" name="observacion" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>