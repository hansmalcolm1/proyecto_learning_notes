<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
	$sql = "select * from usuarios, estudiante where not id=id_usuario and rol_id=2";
	$result = $con->prepare($sql);
	$result->execute();
	$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
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
		<form action="guardar_estudianteDB.php" method="POST">
<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
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
					<td>Usuario</td>
					<td><select name="id_usuario">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->id;?>"><?=$p->usuario;?></option>
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
<?php
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>