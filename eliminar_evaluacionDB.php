<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idevaluacion"]) && strlen($_GET["idevaluacion"])>0){
	$idevaluacion=$_GET["idevaluacion"];
	$sql = "delete from evaluacion where idevaluacion=:idevaluacion";
	$result = $con->prepare($sql);
	$result->bindParam(":idevaluacion", $idevaluacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Evaluación eliminada exitosamente');
	window.location.href='ListarEvaluacionesDB.php'</script>";
}
else{
	echo "<script>alert('El id evaluación no es valido');
	window.location.href='ListarEvaluacionesDB.php'</script>";
}
?>