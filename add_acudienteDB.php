<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from estudiante";
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
		<form action="guardar_acudienteDB.php" method="POST">
			<table>
				<tr>
					<td>Documento</td>
					<td><input type="number" name="documento" /></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nombre" /></td>
				</tr>
				<tr>
					<td>Parentesco</td>
					<td><input type="text" name="parentesco" /></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="direccion" /></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="number" name="telefono" /></td>
				</tr>
				<tr>
					<td>Estudiante</td>
					<td>
						<select name="estudiante_id_alumno">
						<?php
						foreach($personas as $p){
							?>
							<option value="<?=$p->id_alumno;?>"><?=$p->nom_alumno;?></option>
							<?php
						}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
