<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idsubirtarea"]) && strlen($_POST["idsubirtarea"])>0 &&
isset($_POST["tarea_idtarea"]) && strlen($_POST["tarea_idtarea"])>0 &&
isset($_POST["entrega_tarea"]) && strlen($_POST["entrega_tarea"])>0 &&
isset($_POST["usuario1"]) && strlen($_POST["usuario1"])>0){
	$idsubirtarea=$_POST["idsubirtarea"];
	$tarea_idtarea=$_POST["tarea_idtarea"];
	$entrega_tarea=$_POST["entrega_tarea"];
	$usuario1=$_POST["usuario1"];
	$sql = "update subir_tarea set idsubirtarea=:idsubirtarea, tarea_idtarea=:tarea_idtarea, entrega_tarea=:entrega_tarea, usuario1=:usuario1 where idsubirtarea=:idsubirtarea";
	$result = $con->prepare($sql);
	$result->bindParam(":idsubirtarea", $idsubirtarea);
	$result->bindParam(":tarea_idtarea", $tarea_idtarea);
	$result->bindParam(":entrega_tarea", $entrega_tarea);
	$result->bindParam(":usuario1", $usuario1);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Subir tarea actualizado exitosamente');
	window.location.href='ListarSubirTareasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id subir tarea, la tarea, la entrega de la tarea y el usuario son requeridos');
	window.location.href='ListarSubirTareasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>