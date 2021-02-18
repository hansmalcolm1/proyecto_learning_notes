<?php
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	</head>
	<body>
	<br><br>
		<form action="guardar_matriculaDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<a href="ListarMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a>
            <div class="card">
			<table>
				<tr>
					<td>Condición</td>
					<td>
						<select name="Condicion">
							<option value="Nuevo">Nuevo</option>
							<option value="Antiguo">Antiguo</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Año lectivo</td>
					<td><input type="number" name="ano_lectivo" /></td>
				</tr>
				<tr>
					<td>Calendario</td>
					<td>
						<select name="calendario">
							<option value="A">A</option>
							<option value="B">B</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Estado</td>
					<td>
						<select name="estado">
							<option value="Matriculado">Matriculado</option>
							<option value="Retirado">Retirado</option>
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
<?php
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>