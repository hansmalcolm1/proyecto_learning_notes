<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idsubirtarea"]) && strlen($_GET["idsubirtarea"])>0){
	$idsubirtarea=$_GET["idsubirtarea"];
	
	$sql = "delete from subir_tarea where idsubirtarea=:idsubirtarea";
	$result = $con->prepare($sql);
	$result->bindParam(":idsubirtarea", $idsubirtarea);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Subir tarea eliminado exitosamente');
	window.location.href='ListarSubirTareasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id subir tarea no es valido');
	window.location.href='ListarSubirTareasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>