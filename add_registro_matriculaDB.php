<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from matricula";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from estudiante";
$result2 = $con->prepare($sql2);
$result2->execute();
$personas2 = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql3 = "select * from curso";
$result3 = $con->prepare($sql3);
$result3->execute();
$personas3 = $result3->fetchAll(PDO::FETCH_CLASS, "Persona");

?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form action="guardar_registro_matriculaDB.php" method="POST">
			<table>
				<tr>
					<td>Matrícula</td>
					<td><select name="Matricula_idMatricula">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idMatricula;?>"><?=$p->Condicion;?></option>
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
					<td>Curso</td>
					<td><select name="curso_idcurso">
						<?php
					foreach($personas3 as $p3){
						?>
						<option value="<?=$p3->idcurso;?>"><?=$p3->nom_curso;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Promedio</td>
					<td><input type="number" step="any" name="promedio" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
