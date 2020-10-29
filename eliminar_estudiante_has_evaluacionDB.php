<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id_est_evalua"]) && strlen($_GET["id_est_evalua"])>0){
	$id_est_evalua=$_GET["id_est_evalua"];
	$sql = "delete from estudiante_has_evaluacion where id_est_evalua=:id_est_evalua";
	$result = $con->prepare($sql);
	$result->bindParam(":id_est_evalua", $id_est_evalua);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene evaluación eliminado exitosamente');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php'</script>";
}
else{
	echo "<script>alert('El id estudiante tiene evaluación no es valido');
	window.location.href='ListarEstudiantesHasEvaluacionDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>