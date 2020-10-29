<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idtarea"]) && strlen($_POST["idtarea"])>0 &&
isset($_POST["descripcion_tarea"]) && strlen($_POST["descripcion_tarea"])>0 &&
isset($_POST["titulo_tarea"]) && strlen($_POST["titulo_tarea"])>0 &&
isset($_POST["fecha_entrega"]) && strlen($_POST["fecha_entrega"])>0 &&
isset($_POST["materia_idmateria1"]) && strlen($_POST["materia_idmateria1"])>0 &&
isset($_POST["periodo"]) && strlen($_POST["periodo"])>0){
	$idtarea=$_POST["idtarea"];
	$descripcion_tarea=$_POST["descripcion_tarea"];
	$titulo_tarea=$_POST["titulo_tarea"];
	$fecha_entrega=$_POST["fecha_entrega"];
	$materia_idmateria1=$_POST["materia_idmateria1"];
	$periodo=$_POST["periodo"];
	$sql = "update tarea set idtarea=:idtarea, descripcion_tarea=:descripcion_tarea, titulo_tarea=:titulo_tarea, fecha_entrega=:fecha_entrega, materia_idmateria1=:materia_idmateria1, periodo=:periodo where idtarea=:idtarea";
	$result = $con->prepare($sql);
	$result->bindParam(":idtarea", $idtarea);
	$result->bindParam(":descripcion_tarea", $descripcion_tarea);
	$result->bindParam(":titulo_tarea", $titulo_tarea);
	$result->bindParam(":fecha_entrega", $fecha_entrega);
	$result->bindParam(":materia_idmateria1", $materia_idmateria1);
	$result->bindParam(":periodo", $periodo);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Tarea actualizada exitosamente');
	window.location.href='ListarTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('El id tarea, la descripción de la tarea, el título de la tarea, la fecha de entrega, la materia y el periodo son requeridos');
	window.location.href='ListarTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>