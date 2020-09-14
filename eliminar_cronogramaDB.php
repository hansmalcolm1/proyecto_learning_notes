<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idcronograma"]) && strlen($_GET["idcronograma"])>0){
	$idcronograma=$_GET["idcronograma"];
	$sql = "delete from cronograma where idcronograma=:idcronograma";
	$result = $con->prepare($sql);
	$result->bindParam(":idcronograma", $idcronograma);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Cronograma eliminado exitosamente');
	window.location.href='ListarCronogramasDB.php'</script>";
}
else{
	echo "<script>alert('El id cronograma no es valido');
	window.location.href='ListarCronogramasDB.php'</script>";
}
?>