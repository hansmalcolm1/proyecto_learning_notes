<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idmateria"]) && strlen($_GET["idmateria"])>0){
	$idmateria=$_GET["idmateria"];
	$sql = "delete from materia where idmateria=:idmateria";
	$result = $con->prepare($sql);
	$result->bindParam(":idmateria", $idmateria);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Materia eliminada exitosamente');
	window.location.href='ListarMateriasDB.php'</script>";
}
else{
	echo "<script>alert('El id materia no es valido');
	window.location.href='ListarMateriasDB.php'</script>";
}
?>