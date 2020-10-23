<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from docente";
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
		<form action="guardar_cronogramaDB.php" method="POST">
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

			<table>
				<tr>
					<td>Actividad</td>
					<td><input type="text" name="actividad" /></td>
				</tr>
				<tr>
					<td>Responsable</td>
					<td><input type="text" name="responsable" /></td>
				</tr>
				<tr>
					<td>Fecha de la actividad</td>
					<td><input type="date" name="fecha_actividad" /></td>
				</tr>
				<tr>
					<td>Docente</td>
					<td><select name="docente_id_docente">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->id_docente;?>"><?=$p->nom_docente;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
