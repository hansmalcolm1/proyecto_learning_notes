<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idcronograma"]) && strlen($_POST["idcronograma"])>0 &&
isset($_POST["actividad"]) && strlen($_POST["actividad"])>0 &&
isset($_POST["fecha_actividad"]) && strlen($_POST["fecha_actividad"])>0 &&
isset($_POST["docente_id_docente"]) && strlen($_POST["docente_id_docente"])>0){
	$idcronograma=$_POST["idcronograma"];
	$actividad=$_POST["actividad"];
	$fecha_actividad=$_POST["fecha_actividad"];
	$docente_id_docente=$_POST["docente_id_docente"];
	$sql = "update cronograma set idcronograma=:idcronograma, actividad=:actividad, fecha_actividad=:fecha_actividad, docente_id_docente=:docente_id_docente where idcronograma=:idcronograma";
	$result = $con->prepare($sql);
	$result->bindParam(":idcronograma", $idcronograma);
	$result->bindParam(":actividad", $actividad);
	$result->bindParam(":fecha_actividad", $fecha_actividad);
	$result->bindParam(":docente_id_docente", $docente_id_docente);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Cronograma actualizado exitosamente');
	window.location.href='ListarCronogramasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id cronograma, la actividad, la fecha de la actividad y el docente son requeridos');
	window.location.href='ListarCronogramasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>