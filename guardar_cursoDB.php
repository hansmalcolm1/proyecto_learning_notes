<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["nom_curso"]) && strlen($_POST["nom_curso"])>0 &&
isset($_POST["docente_id_docente"]) && strlen($_POST["docente_id_docente"])>0){
	$nom_curso=$_POST["nom_curso"];
	$docente_id_docente=$_POST["docente_id_docente"];
	$sql = "insert into curso (nom_curso, docente_id_docente) values (:nom_curso, :docente_id_docente)";
	$result = $con->prepare($sql);
	$result->bindParam(":nom_curso", $nom_curso);
	$result->bindParam(":docente_id_docente", $docente_id_docente);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Curso creado exitosamente');
	window.location.href='ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('El nombre del curso y el docente son requeridos');
	window.location.href='ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>