<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from materia";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from estudiante";
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
		<form action="guardar_definitivas_periodo_materiaDB.php" method="POST">
			<table>
				<tr>
					<td>Nota periodo 1</td>
					<td><input type="number" step="any" name="nota_periodo_1" /></td>
				</tr>
				<tr>
					<td>Nota 2</td>
					<td><input type="number" step="any" name="nota2" /></td>
				</tr>
				<tr>
					<td>Nota 3</td>
					<td><input type="number" step="any" name="nota3" /></td>
				</tr>
				<tr>
					<td>Nota 4</td>
					<td><input type="number" step="any" name="nota4" /></td>
				</tr>
				<tr>
					<td>Definitiva del periodo</td>
					<td><input type="number" step="any" name="def_periodo" /></td>
				</tr>
				<tr>
					<td>Materia</td>
					<td><select name="materia_idmateria">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idmateria;?>"><?=$p->nom_materia;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Estudiante</td>
					<td><select name="estudiante_id_alumno">
						<?php
					foreach($personas2 as $p2){
						?>
						<option value="<?=$p2->id_alumno;?>"><?=$p2->nom_alumno;?></option>
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
