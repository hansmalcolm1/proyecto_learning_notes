<?php
include("conexion.php");
if(isset($_POST["descripcion_tarea"]) && strlen($_POST["descripcion_tarea"])>0 &&
isset($_POST["titulo_tarea"]) && strlen($_POST["titulo_tarea"])>0 &&
isset($_POST["fecha_entrega"]) && strlen($_POST["fecha_entrega"])>0 &&
isset($_POST["materia_idmateria1"]) && strlen($_POST["materia_idmateria1"])>0 &&
isset($_POST["periodo"]) && strlen($_POST["periodo"])>0){
	$descripcion_tarea=$_POST["descripcion_tarea"];
	$titulo_tarea=$_POST["titulo_tarea"];
	$fecha_entrega=$_POST["fecha_entrega"];
	$materia_idmateria1=$_POST["materia_idmateria1"];
	$periodo=$_POST["periodo"];
	$sql = "insert into tarea (descripcion_tarea, titulo_tarea, fecha_entrega, materia_idmateria1, periodo) values (:descripcion_tarea, :titulo_tarea, :fecha_entrega, :materia_idmateria1, :periodo)";
	$result = $con->prepare($sql);
	$result->bindParam(":descripcion_tarea", $descripcion_tarea);
	$result->bindParam(":titulo_tarea", $titulo_tarea);
	$result->bindParam(":fecha_entrega", $fecha_entrega);
	$result->bindParam(":materia_idmateria1", $materia_idmateria1);
	$result->bindParam(":periodo", $periodo);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Tarea creada exitosamente');
	window.location.href='ListarTareasDB.php'</script>";
}
else{
	echo "<script>alert('La descripción de la tarea, el título de la tarea, la fecha de entrega, la materia y el periodo son requeridos');
	window.location.href='ListarTareasDB.php'</script>";
}
?>