<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["id_est_tarea"]) && strlen($_GET["id_est_tarea"])){
	$id_est_tarea=$_GET["id_est_tarea"];
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$tarea_idtarea=$_GET["tarea_idtarea"];
	$sql = "select * from estudiante_has_tarea where id_est_tarea=:id_est_tarea";
	$result = $con->prepare($sql);
	$result->bindParam(":id_est_tarea", $id_est_tarea);
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
		</head>
		<body>
			<form action="salvar_estudiante_has_tareaDB.php" method="POST">
				<table>
					<tr>
						<td>Id estudiante tiene tarea</td>
						<td><input type="number" name="id_est_tarea" value="<?=$p->id_est_tarea;?>" readonly/></td>
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
?>
