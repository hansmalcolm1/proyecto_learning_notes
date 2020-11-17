<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idevaluacion"]) && strlen($_POST["idevaluacion"])>0 &&
isset($_POST["descripcion_evaluacion"]) && strlen($_POST["descripcion_evaluacion"])>0 &&
isset($_POST["titulo_evaluacion"]) && strlen($_POST["titulo_evaluacion"])>0 &&
isset($_POST["fecha_evaluacion"]) && strlen($_POST["fecha_evaluacion"])>0 &&
isset($_POST["materia_idmateria1"]) && strlen($_POST["materia_idmateria1"])>0 &&
isset($_POST["periodo"]) && strlen($_POST["periodo"])>0){
	$idevaluacion=$_POST["idevaluacion"];
	$descripcion_evaluacion=$_POST["descripcion_evaluacion"];
	$titulo_evaluacion=$_POST["titulo_evaluacion"];
	$fecha_evaluacion=$_POST["fecha_evaluacion"];
	$materia_idmateria1=$_POST["materia_idmateria1"];
	$periodo=$_POST["periodo"];
	$sql = "update evaluacion set idtarea=:idevaluacion, descripcion_tarea=:descripcion_evaluacion, titulo_tarea=:titulo_evaluacion, fecha_entrega=:fecha_evaluacion, materia_idmateria1=:materia_idmateria1, periodo=:periodo where idtarea=:idevaluacion";
	$result = $con->prepare($sql);
	$result->bindParam(":idevaluacion", $idevaluacion);
	$result->bindParam(":descripcion_evaluacion", $descripcion_evaluacion);
	$result->bindParam(":titulo_evaluacion", $titulo_evaluacion);
	$result->bindParam(":fecha_evaluacion", $fecha_evaluacion);
	$result->bindParam(":materia_idmateria1", $materia_idmateria1);
	$result->bindParam(":periodo", $periodo);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Evaluación actualizada exitosamente');
	window.location.href='ListarEvaluacionesDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id evaluación, la descripción de la evaluación, el título de la evaluación, la fecha de la evaluación, la materia y el periodo son requeridos');
	window.location.href='ListarEvaluacionesDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>