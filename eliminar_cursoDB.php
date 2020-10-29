<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idcurso"]) && strlen($_GET["idcurso"])>0){
	$idcurso=$_GET["idcurso"];
	$sql = "delete from curso where idcurso=:idcurso";
	$result = $con->prepare($sql);
	$result->bindParam(":idcurso", $idcurso);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Curso eliminado exitosamente');
	window.location.href='ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('El id curso no es valido');
	window.location.href='ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>