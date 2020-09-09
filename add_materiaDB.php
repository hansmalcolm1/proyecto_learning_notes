<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from curso";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from docente";
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
		<form action="guardar_materiaDB.php" method="POST">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nom_materia" /></td>
				</tr>
				<tr>
					<td>Curso</td>
					<td><select name="curso_idcurso">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idcurso;?>"><?=$p->nom_curso;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Docente</td>
					<td><select name="docente_id_docente">
						<?php
					foreach($personas2 as $p2){
						?>
						<option value="<?=$p2->id_docente;?>"><?=$p2->nom_docente;?></option>
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
