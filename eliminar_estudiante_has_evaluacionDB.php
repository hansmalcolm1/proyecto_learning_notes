<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["estudiante_id_alumno"]) && strlen($_GET["estudiante_id_alumno"])>0){
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$sql = "delete from estudiante_has_evaluacion where estudiante_id_alumno=:estudiante_id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene evaluación eliminado exitosamente');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id estudiante tiene evaluación no es valido');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>