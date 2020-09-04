<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="guardar_docenteDB.php" method="POST">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nom_docente" /></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="direccion" /></td>
				</tr>
				<tr>
					<td>Teléfono</td>
					<td><input type="number" name="telefono" /></td>
				</tr>
				<tr>
					<td>Correo</td>
					<td><input type="email" name="correo" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>