<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from registro_matricula, matricula where Matricula_idMatricula=idMatricula";
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
		<form action="guardar_observacionDB.php" method="POST">
			<table>
				<tr>
					<td>Observación</td>
					<td><input type="text" name="observacion" /></td>
				</tr>
				<tr>
					<td>Fecha de la observación</td>
					<td><input type="date" name="Fecha_observa" /></td>
				</tr>
				<tr>
					<td>Registro de la matrícula</td>
					<td><select name="registro_matricula_id">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->id;?>"><?=$p->idMatricula;?> <?=$p->Condicion;?></option>
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
