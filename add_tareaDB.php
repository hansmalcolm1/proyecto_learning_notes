<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from materia";
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
		<form action="guardar_tareaDB.php" method="POST">
			<table>
				<tr>
					<td>Descripción de la tarea</td>
					<td><input type="text" name="descripcion_tarea" /></td>
				</tr>
				<tr>
					<td>Título de la tarea</td>
					<td><input type="text" name="titulo_tarea" /></td>
				</tr>
				<tr>
					<td>Fecha de entrega</td>
					<td><input type="date" name="fecha_entrega" /></td>
				</tr>
				<tr>
					<td>Materia</td>
					<td><select name="materia_idmateria1">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idmateria;?>"><?=$p->nom_materia;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Periodo</td>
					<td><input type="number" name="periodo" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
