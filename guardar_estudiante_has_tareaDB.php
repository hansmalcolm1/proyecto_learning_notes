<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["tarea_idtarea"]) && strlen($_POST["tarea_idtarea"])>0 &&
isset($_POST["nota"]) && strlen($_POST["nota"])>0 &&
isset($_POST["observacion"]) && strlen($_POST["observacion"])>0){
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$tarea_idtarea=$_POST["tarea_idtarea"];
	$nota=$_POST["nota"];
	$observacion=$_POST["observacion"];
	$sql = "insert into estudiante_has_tarea (estudiante_id_alumno, tarea_idtarea, nota, observacion) values (:estudiante_id_alumno, :tarea_idtarea, :nota, :observacion)";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":tarea_idtarea", $tarea_idtarea);
	$result->bindParam(":nota", $nota);
	$result->bindParam(":observacion", $observacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene tarea creado exitosamente');
	window.location.href='ListarEstudiantesHasTareaDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El estudiante, la tarea, la nota y la observación son requeridos');
	window.location.href='ListarEstudiantesHasTareaDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>