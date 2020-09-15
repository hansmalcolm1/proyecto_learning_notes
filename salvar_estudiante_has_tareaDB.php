<?php
include("conexion.php");
if(isset($_POST["id_est_tarea"]) && strlen($_POST["id_est_tarea"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["tarea_idtarea"]) && strlen($_POST["tarea_idtarea"])>0 &&
isset($_POST["nota"]) && strlen($_POST["nota"])>0 &&
isset($_POST["observacion"]) && strlen($_POST["observacion"])>0){
	$id_est_tarea=$_POST["id_est_tarea"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$tarea_idtarea=$_POST["tarea_idtarea"];
	$nota=$_POST["nota"];
	$observacion=$_POST["observacion"];
	$sql = "update estudiante_has_tarea set id_est_tarea=:id_est_tarea, estudiante_id_alumno=:estudiante_id_alumno, tarea_idtarea=:tarea_idtarea, nota=:nota, observacion=:observacion where id_est_tarea=:id_est_tarea";
	$result = $con->prepare($sql);
	$result->bindParam(":id_est_tarea", $id_est_tarea);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":tarea_idtarea", $tarea_idtarea);
	$result->bindParam(":nota", $nota);
	$result->bindParam(":observacion", $observacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene tarea actualizado exitosamente');
	window.location.href='ListarEstudiantesHasTareaDB.php'</script>";
}
else{
	echo "<script>alert('El id estudiante tiene tarea, el estudiante, la tarea, la nota y la observación son requeridos');
	window.location.href='ListarEstudiantesHasTareaDB.php'</script>";
}
?>