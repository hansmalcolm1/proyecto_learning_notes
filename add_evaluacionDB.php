<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from materia";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
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
		<form action="guardar_evaluacionDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<a href="ListarEvaluacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a>
            <div class="card">
			<table>
				<tr>
					<td>Descripción de la evaluación</td>
					<td><input type="text" name="descripcion_evaluacion" /></td>
				</tr>
				<tr>
					<td>Título de la evaluación</td>
					<td><input type="text" name="titulo_evaluacion" /></td>
				</tr>
				<tr>
					<td>Fecha de la evaluación</td>
					<td><input type="date" name="fecha_evaluacion" /></td>
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
<?php
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>