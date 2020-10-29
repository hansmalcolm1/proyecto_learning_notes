<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idmateria"]) && strlen($_GET["idmateria"])>0){
	$idmateria=$_GET["idmateria"];
	$sql = "delete from materia where idmateria=:idmateria";
	$result = $con->prepare($sql);
	$result->bindParam(":idmateria", $idmateria);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Materia eliminada exitosamente');
	window.location.href='ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('El id materia no es valido');
	window.location.href='ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>