<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0 &&
isset($_POST["nota"]) && strlen($_POST["nota"])>0 &&
isset($_POST["observacion"]) && strlen($_POST["observacion"])>0){
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$nota=$_POST["nota"];
	$observacion=$_POST["observacion"];
	$sql = "update curso set estudiante_id_alumno=:estudiante_id_alumno, curso_idcurso=:curso_idcurso, nota=:nota, observacion=:observacion where estudiante_id_alumno=:estudiante_id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->bindParam(":nota", $nota);
	$result->bindParam(":observacion", $observacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante has curso actualizado exitosamente');
	window.location.href='ListarEstudianteHasCursoDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id estudiante, id curso, la nota y la observacion son requeridos');
	window.location.href='ListarEstudianteHasCursoDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>