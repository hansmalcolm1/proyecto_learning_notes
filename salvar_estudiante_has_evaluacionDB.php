<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["evaluacion_idevaluacion"]) && strlen($_POST["evaluacion_idevaluacion"])>0 &&
isset($_POST["nota"]) && strlen($_POST["nota"])>0 &&
isset($_POST["observacion"]) && strlen($_POST["observacion"])>0){
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$evaluacion_idevaluacion=$_POST["evaluacion_idevaluacion"];
	$nota=$_POST["nota"];
	$observacion=$_POST["observacion"];
	$sql = "update estudiante_has_evaluacion set estudiante_id_alumno=:estudiante_id_alumno, evaluacion_idtarea=:evaluacion_idevaluacion, nota=:nota, observacion=:observacion where estudiante_id_alumno=:estudiante_id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":evaluacion_idevaluacion", $evaluacion_idevaluacion);
	$result->bindParam(":nota", $nota);
	$result->bindParam(":observacion", $observacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene evaluacion actualizado exitosamente');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id estudiante tiene evaluación, el estudiante, la evaluación, la nota y la observación son requeridos');
	window.location.href='ListarEstudiantesHasEvaluaciónDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>