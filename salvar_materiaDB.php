<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idmateria"]) && strlen($_POST["idmateria"])>0 &&
isset($_POST["nom_materia"]) && strlen($_POST["nom_materia"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0 &&
isset($_POST["docente_id_docente"]) && strlen($_POST["docente_id_docente"])>0){
	$idmateria=$_POST["idmateria"];
	$nom_materia=$_POST["nom_materia"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$docente_id_docente=$_POST["docente_id_docente"];
	$sql = "update materia set idmateria=:idmateria, nom_materia=:nom_materia, curso_idcurso=:curso_idcurso, docente_id_docente=:docente_id_docente where idmateria=:idmateria";
	$result = $con->prepare($sql);
	$result->bindParam(":idmateria", $idmateria);
	$result->bindParam(":nom_materia", $nom_materia);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->bindParam(":docente_id_docente", $docente_id_docente);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Materia actualizada exitosamente');
	window.location.href='ListarMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id materia, el nombre de la materia, el curso y el docente son requeridos');
	window.location.href='ListarMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>