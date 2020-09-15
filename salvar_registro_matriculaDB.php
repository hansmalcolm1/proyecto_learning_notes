<?php
include("conexion.php");
if(isset($_POST["id"]) && strlen($_POST["id"])>0 &&
isset($_POST["Matricula_idMatricula"]) && strlen($_POST["Matricula_idMatricula"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0 &&
isset($_POST["promedio"]) && strlen($_POST["promedio"])>0){
	$id=$_POST["id"];
	$Matricula_idMatricula=$_POST["Matricula_idMatricula"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$promedio=$_POST["promedio"];
	$sql = "update registro_matricula set id=:id, Matricula_idMatricula=:Matricula_idMatricula, estudiante_id_alumno=:estudiante_id_alumno, curso_idcurso=:curso_idcurso, promedio=:promedio where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->bindParam(":Matricula_idMatricula", $Matricula_idMatricula);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->bindParam(":promedio", $promedio);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Registro matrícula actualizado exitosamente');
	window.location.href='ListarRegistrosMatriculasDB.php'</script>";
}
else{
	echo "<script>alert('El id registro matrícula, la matrícula, el estudiante, el curso y el promedio son requeridos');
	window.location.href='ListarRegistrosMatriculasDB.php'</script>";
}
?>