<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["estudiante_id_alumno"]) && strlen($_GET["estudiante_id_alumno"])>0 && 
isset($_GET["curso_idcurso"]) && strlen($_GET["curso_idcurso"])>0){
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$curso_idcurso=$_GET["curso_idcurso"];
	$sql = "delete from estudiante_has_curso where estudiante_id_alumno=:estudiante_id_alumno and curso_idcurso=:curso_idcurso";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante tiene curso eliminado exitosamente');
	window.location.href='ListarEstudianteHasCursoDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id estudiante tiene curso no es valido');
	window.location.href='ListarEstudianteHasCursoDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>