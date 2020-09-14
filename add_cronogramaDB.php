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
	</head>
	<body>
		<form action="guardar_cronogramaDB.php" method="POST">
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
