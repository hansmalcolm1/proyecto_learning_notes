<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<form action="guardar_matriculaDB.php" method="POST">
			<table>
				<tr>
					<td>Condición</td>
					<td><input type="text" name="Condicion" /></td>
				</tr>
				<tr>
					<td>Año lectivo</td>
					<td><input type="number" name="ano_lectivo" /></td>
				</tr>
				<tr>
					<td>Calendario</td>
					<td><input type="text" name="calendario" /></td>
				</tr>
				<tr>
					<td>Estado</td>
					<td><input type="text" name="estado" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Guardar" /></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
