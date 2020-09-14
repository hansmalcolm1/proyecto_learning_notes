<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idMatricula"]) && strlen($_GET["idMatricula"])>0){
	$idMatricula=$_GET["idMatricula"];
	$sql = "delete from matricula where idMatricula=:idMatricula";
	$result = $con->prepare($sql);
	$result->bindParam(":idMatricula", $idMatricula);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Matrícula eliminada exitosamente');
	window.location.href='ListarMatriculasDB.php'</script>";
}
else{
	echo "<script>alert('El id matrícula no es valido');
	window.location.href='ListarMatriculasDB.php'</script>";
}
?>