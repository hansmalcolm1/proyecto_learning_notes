<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="guardar_estudianteDB.php" method="POST">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nom_alumno" /></td>
				</tr>
				<tr>
					<td>Documento</td>
					<td><input type="number" name="documento" /></td>
				</tr>
				<tr>
					<td>Celular</td>
					<td><input type="number" name="celular" /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="email" /></td>
				</tr>
				<tr>
					<td>Fecha de nacimiento</td>
					<td><input type="date" name="fecha_nacimiento" /></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="direccion" /></td>
				</tr>
				<tr>
					<td>Teléfono fijo</td>
					<td><input type="number" name="telefono_fijo" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>