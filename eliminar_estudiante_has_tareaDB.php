<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id_est_tarea"]) && strlen($_GET["id_est_tarea"])>0){
	$id_est_tarea=$_GET["id_est_tarea"];
	$sql = "delete from estudiante_has_tarea where id_est_tarea=:id_est_tarea";
	$result = $con->prepare($sql);
	$result->bindParam(":id_est_tarea", $id_est_tarea);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene tarea eliminado exitosamente');
	window.location.href='ListarEstudiantesHasTareaDB.php'</script>";
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