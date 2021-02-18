<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
	$sql = "select * from usuarios where not exists (select * from docente where id_us=id_usuario1) and rol_id=3";
	$result = $con->prepare($sql);
	$result->execute();
	$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	</head>
	<body>
	<br><br>
		<form action="guardar_docenteDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<a href="ListarDocentesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a>
            <div class="card">
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
					<td>Número del documento</td>
					<td><input type="number" name="numero_documento" /></td>
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