<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idcronograma"]) && strlen($_GET["idcronograma"])>0){
	$idcronograma=$_GET["idcronograma"];
	$sql = "delete from cronograma where idcronograma=:idcronograma";
	$result = $con->prepare($sql);
	$result->bindParam(":idcronograma", $idcronograma);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Cronograma eliminado exitosamente');
	window.location.href='ListarCronogramasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id cronograma no es valido');
	window.location.href='ListarCronogramasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>