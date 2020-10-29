<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id_est_evalua"]) && strlen($_GET["id_est_evalua"])){
	$id_est_evalua=$_GET["id_est_evalua"];
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$evaluacion_idevaluacion=$_GET["evaluacion_idevaluacion"];
	$sql = "select * from estudiante_has_evaluacion where id_est_evalua=:id_est_evalua";
	$result = $con->prepare($sql);
	$result->bindParam(":id_est_evalua", $id_est_evalua);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from estudiante";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from evaluacion";
	$result3 = $con->prepare($sql3);
	$result3->execute();
	$personas2 = $result3->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_estudiante_has_evaluacionDB.php" method="POST">
				<table>
					<tr>
						<td>Id estudiante tiene tarea</td>
						<td><input type="number" name="id_est_evalua" value="<?=$p->id_est_evalua;?>" readonly/></td>
					</tr>
					<tr>
						<td>Estudiante</td>
						<td><select name="estudiante_id_alumno">
							<?php
						foreach($personas as $p2){
							if($estudiante_id_alumno==$p2->id_alumno){
								?>
								<option value="<?=$p2->id_alumno;?>" selected><?=$p2->nom_alumno;?></option>
								<?php
							}

							else{
								?>
								<option value="<?=$p2->id_alumno;?>"><?=$p2->nom_alumno;?></option>
								<?php
							}
							
						}
						?></select></td>
					</tr>
					<tr>
						<td>Evaluación</td>
						<td><select name="evaluacion_idevaluacion">
							<?php
						foreach($personas2 as $p3){
							if($evaluacion_idevaluacion==$p3->idevaluacion){
								?>
								<option value="<?=$p3->idevaluacion;?>" selected><?=$p3->titulo_evaluacion;?></option>
								<?php
							}
							
							else{
								?>
								<option value="<?=$p3->idevaluacion;?>"><?=$p3->titulo_evaluacion;?></option>
								<?php
							}

						}
						?></select></td>
					</tr>
					<tr>
						<td>Nota</td>
						<td><input type="number" step="any" name="nota" value="<?=$p->nota;?>"/></td>
					</tr>
					<tr>
						<td>Obsevación</td>
						<td><input type="text" name="observacion" value="<?=$p->observacion;?>"/></td>
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
	echo "<script>alert('El id estudiante tiene Evaluación no es valido');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
