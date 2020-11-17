<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["nom_materia"]) && strlen($_POST["nom_materia"])>0 &&
isset($_POST["curso_idcurso"]) && strlen($_POST["curso_idcurso"])>0 &&
isset($_POST["docente_id_docente"]) && strlen($_POST["docente_id_docente"])>0){
	$nom_materia=$_POST["nom_materia"];
	$curso_idcurso=$_POST["curso_idcurso"];
	$docente_id_docente=$_POST["docente_id_docente"];
	$sql = "insert into materia (nom_materia, curso_idcurso, docente_id_docente) values (:nom_materia, :curso_idcurso, :docente_id_docente)";
	$result = $con->prepare($sql);
	$result->bindParam(":nom_materia", $nom_materia);
	$result->bindParam(":curso_idcurso", $curso_idcurso);
	$result->bindParam(":docente_id_docente", $docente_id_docente);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Materia creada exitosamente');
	window.location.href='ListarMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El nombre de la materia, el curso y el docente son requeridos');
	window.location.href='ListarMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>