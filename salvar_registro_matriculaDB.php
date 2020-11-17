<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["id"]) && strlen($_POST["id"])>0 &&
isset($_POST["Matricula_idMatricula"]) && strlen($_POST["Matricula_idMatricula"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0){
	$id=$_POST["id"];
	$Matricula_idMatricula=$_POST["Matricula_idMatricula"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$sql = "update registro_matricula set id=:id, Matricula_idMatricula=:Matricula_idMatricula, estudiante_id_alumno=:estudiante_id_alumno, curso_idcurso=:curso_idcurso where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->bindParam(":Matricula_idMatricula", $Matricula_idMatricula);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Registro matrícula actualizado exitosamente');
	window.location.href='ListarRegistrosMatriculasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id registro matrícula, la matrícula, el estudiante, el curso y el promedio son requeridos');
	window.location.href='ListarRegistrosMatriculasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>