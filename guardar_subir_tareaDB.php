<?php
include("conexion.php");
include("Persona.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["tarea_idtarea"]) && strlen($_POST["tarea_idtarea"])>0 &&
isset($_POST["entrega_tarea"]) && strlen($_POST["entrega_tarea"])>0 &&
isset($_POST["usuario1"]) && strlen($_POST["usuario1"])>0){
	$tarea_idtarea=$_POST["tarea_idtarea"];
	$entrega_tarea=$_POST["entrega_tarea"];
	$usuario1=$_POST["usuario1"];
	$sql = "insert into subir_tarea (tarea_idtarea, entrega_tarea, usuario1) values (:tarea_idtarea, :entrega_tarea, :usuario1)";
	$result = $con->prepare($sql);
	$result->bindParam(":tarea_idtarea", $tarea_idtarea);
	$result->bindParam(":entrega_tarea", $entrega_tarea);
	$result->bindParam(":usuario1", $usuario1);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Subir Tarea creada exitosamente');
	window.location.href='ListarSubirTareasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('La tarea, la entrega de la tarea y el usuario son requeridos');
	window.location.href='ListarSubirTareasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>