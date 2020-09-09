<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["id"]) && strlen($_GET["id"])>0){
	$id=$_GET["id"];
	$sql = "delete from acudientes where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Acudiente eliminado exitosamente');
	window.location.href='ListarAcudientesDB.php'</script>";
}
else{
	echo "<script>alert('El id acudiente no es valido');
	window.location.href='ListarAcudientesDB.php'</script>";
}
?>