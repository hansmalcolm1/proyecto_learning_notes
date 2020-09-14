<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idtarea"]) && strlen($_GET["idtarea"])>0){
	$idtarea=$_GET["idtarea"];
	$sql = "delete from tarea where idtarea=:idtarea";
	$result = $con->prepare($sql);
	$result->bindParam(":idtarea", $idtarea);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Tarea eliminada exitosamente');
	window.location.href='ListarTareasDB.php'</script>";
}
else{
	echo "<script>alert('El id tarea no es valido');
	window.location.href='ListarTareasDB.php'</script>";
}
?>