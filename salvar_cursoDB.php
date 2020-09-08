<?php
include("conexion.php");
if(isset($_POST["idcurso"]) && strlen($_POST["idcurso"])>0 &&
isset($_POST["nom_curso"]) && strlen($_POST["nom_curso"])>0 &&
isset($_POST["docente_id_docente"]) && strlen($_POST["docente_id_docente"])>0){
	$idcurso=$_POST["idcurso"];
	$nom_curso=$_POST["nom_curso"];
	$docente_id_docente=$_POST["docente_id_docente"];
	$sql = "update curso set idcurso=:idcurso, nom_curso=:nom_curso, docente_id_docente=:docente_id_docente where idcurso=:idcurso";
	$result = $con->prepare($sql);
	$result->bindParam(":idcurso", $idcurso);
	$result->bindParam(":nom_curso", $nom_curso);
	$result->bindParam(":docente_id_docente", $docente_id_docente);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Curso actualizado exitosamente');
	window.location.href='ListarCursosDB.php'</script>";
}
else{
	echo "<script>alert('El id curso, el nombre del curso y el docente son requeridos');
	window.location.href='ListarCursosDB.php'</script>";
}
?>