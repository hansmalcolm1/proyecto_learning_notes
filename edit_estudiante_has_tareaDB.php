<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["estudiante_id_alumno"]) && strlen($_GET["estudiante_id_alumno"])){
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$tarea_idtarea=$_GET["tarea_idtarea"];
	$sql = "select * from estudiante_has_tarea where estudiante_id_alumno=:estudiante_id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from estudiante";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from tarea";
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
			<form action="salvar_estudiante_has_tareaDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td><a href="ListarEstudiantesHasTareaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></td>
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
						<td>Tarea</td>
						<td><select name="tarea_idtarea">
							<?php
						foreach($personas2 as $p3){
							if($tarea_idtarea==$p3->idtarea){
								?>
								<option value="<?=$p3->idtarea;?>" selected><?=$p3->titulo_tarea;?></option>
								<?php
							}
							
							else{
								?>
								<option value="<?=$p3->idtarea;?>"><?=$p3->titulo_tarea;?></option>
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
	echo "<script>alert('El id estudiante tiene tarea no es valido');
	window.location.href='ListarEstudiantesHasTareaDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
