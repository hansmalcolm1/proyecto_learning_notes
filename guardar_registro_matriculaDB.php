<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["Matricula_idMatricula"]) && strlen($_POST["Matricula_idMatricula"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0){
	$Matricula_idMatricula=$_POST["Matricula_idMatricula"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$sql = "insert into registro_matricula (Matricula_idMatricula, estudiante_id_alumno, curso_idcurso) values (:Matricula_idMatricula, :estudiante_id_alumno, :curso_idcurso)";
	$result = $con->prepare($sql);
	$result->bindParam(":Matricula_idMatricula", $Matricula_idMatricula);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Registro matrícula creado exitosamente');
	window.location.href='ListarRegistrosMatriculasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('La matrícula, el estudiante, el curso y el promedio son requeridos');
	window.location.href='ListarRegistrosMatriculasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>