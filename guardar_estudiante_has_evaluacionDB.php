<?php
include("conexion.php");
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["evaluacion_idevaluacion"]) && strlen($_POST["evaluacion_idevaluacion"])>0 &&
isset($_POST["nota"]) && strlen($_POST["nota"])>0 &&
isset($_POST["observacion"]) && strlen($_POST["observacion"])>0){
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$evaluacion_idevaluacion=$_POST["evaluacion_idevaluacion"];
	$nota=$_POST["nota"];
	$observacion=$_POST["observacion"];
	$sql = "insert into estudiante_has_evaluacion (estudiante_id_alumno, evaluacion_idevaluacion, nota, observacion) values (:estudiante_id_alumno, :evaluacion_idevaluacion, :nota, :observacion)";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":evaluacion_idevaluacion", $evaluacion_idevaluacion);
	$result->bindParam(":nota", $nota);
	$result->bindParam(":observacion", $observacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene evaluación creado exitosamente');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php'</script>";
}
else{
	echo "<script>alert('El estudiante, la evaluación, la nota y la observación son requeridos');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>