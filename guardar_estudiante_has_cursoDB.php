<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0){
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$sql = "insert into estudiante_has_curso (estudiante_id_alumno, curso_idcurso) values (:estudiante_id_alumno, :curso_idcurso)";
	$result = $con->prepare($sql);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante has curso creado exitosamente');
	window.location.href='ListarEstudianteHasCursoDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('La nota y la obsevación son requeridos');
	window.location.href='ListarEstudianteHasCursoDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>