<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from estudiante";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from evaluacion";
$result2 = $con->prepare($sql2);
$result2->execute();
$personas2 = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form action="guardar_estudiante_has_evaluacionDB.php" method="POST">
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
					<td>Evaluación</td>
					<td><select name="evaluacion_idevaluacion">
						<?php
					foreach($personas2 as $p2){
						?>
						<option value="<?=$p2->idevaluacion;?>"><?=$p2->titulo_evaluacion;?></option>
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
