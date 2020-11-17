<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from matricula";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from estudiante";
$result2 = $con->prepare($sql2);
$result2->execute();
$personas2 = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql3 = "select * from curso";
$result3 = $con->prepare($sql3);
$result3->execute();
$personas3 = $result3->fetchAll(PDO::FETCH_CLASS, "Persona");
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
		<form action="guardar_registro_matriculaDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
			<table>
				<tr>
					<td>Matrícula</td>
					<td><select name="Matricula_idMatricula">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idMatricula;?>"><?=$p->Condicion;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Estudiante</td>
					<td><select name="estudiante_id_alumno">
						<?php
					foreach($personas2 as $p2){
						?>
						<option value="<?=$p2->id_alumno;?>"><?=$p2->nom_alumno;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Curso</td>
					<td><select name="curso_idcurso">
						<?php
					foreach($personas3 as $p3){
						?>
						<option value="<?=$p3->idcurso;?>"><?=$p3->nom_curso;?></option>
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