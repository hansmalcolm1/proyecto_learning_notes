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
		<form action="guardar_cursoDB.php" method="POST">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nom_curso" /></td>
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
