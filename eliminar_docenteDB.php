<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id_docente"]) && strlen($_GET["id_docente"])>0){
	$id_docente=$_GET["id_docente"];
	$sql = "delete from docente where id_docente=:id_docente";
	$result = $con->prepare($sql);
	$result->bindParam(":id_docente", $id_docente);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Docente eliminado exitosamente');
	window.location.href='ListarDocentesDB.php'</script>";
}
else{
	echo "<script>alert('El id docente no es valido');
	window.location.href='ListarDocentesDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>