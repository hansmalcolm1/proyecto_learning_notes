<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["id_alumno"]) && strlen($_GET["id_alumno"])>0){
	$id_alumno=$_GET["id_alumno"];
	$sql = "delete from estudiante where id_alumno=:id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":id_alumno", $id_alumno);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante eliminado exitosamente');
	window.location.href='ListarEstudiantesDB.php'</script>";
}
else{
	echo "<script>alert('El id alumno no es valido');
	window.location.href='ListarEstudiantesDB.php'</script>";
}
?>