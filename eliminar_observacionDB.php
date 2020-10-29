<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id_observa"]) && strlen($_GET["id_observa"])>0){
	$id_observa=$_GET["id_observa"];
	$sql = "delete from observacion where id_observa=:id_observa";
	$result = $con->prepare($sql);
	$result->bindParam(":id_observa", $id_observa);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Observación eliminada exitosamente');
	window.location.href='ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('El id observación no es valido');
	window.location.href='ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>