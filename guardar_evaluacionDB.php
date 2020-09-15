<?php
include("conexion.php");
if(isset($_POST["descripcion_evaluacion"]) && strlen($_POST["descripcion_evaluacion"])>0 &&
isset($_POST["titulo_evaluacion"]) && strlen($_POST["titulo_evaluacion"])>0 &&
isset($_POST["fecha_evaluacion"]) && strlen($_POST["fecha_evaluacion"])>0 &&
isset($_POST["materia_idmateria1"]) && strlen($_POST["materia_idmateria1"])>0 &&
isset($_POST["periodo"]) && strlen($_POST["periodo"])>0){
	$descripcion_evaluacion=$_POST["descripcion_evaluacion"];
	$titulo_evaluacion=$_POST["titulo_evaluacion"];
	$fecha_evaluacion=$_POST["fecha_evaluacion"];
	$materia_idmateria1=$_POST["materia_idmateria1"];
	$periodo=$_POST["periodo"];
	$sql = "insert into evaluacion (descripcion_evaluacion, titulo_evaluacion, fecha_evaluacion, materia_idmateria1, periodo) values (:descripcion_evaluacion, :titulo_evaluacion, :fecha_evaluacion, :materia_idmateria1, :periodo)";
	$result = $con->prepare($sql);
	$result->bindParam(":descripcion_evaluacion", $descripcion_evaluacion);
	$result->bindParam(":titulo_evaluacion", $titulo_evaluacion);
	$result->bindParam(":fecha_evaluacion", $fecha_evaluacion);
	$result->bindParam(":materia_idmateria1", $materia_idmateria1);
	$result->bindParam(":periodo", $periodo);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Evaluación creada exitosamente');
	window.location.href='ListarEvaluacionesDB.php'</script>";
}
else{
	echo "<script>alert('La descripción de la evaluación, el título de la evaluación, la fecha de la evaluación, la materia y el periodo son requeridos');
	window.location.href='ListarEvaluacionesDB.php'</script>";
}
?>