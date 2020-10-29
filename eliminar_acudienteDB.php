<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id"]) && strlen($_GET["id"])>0){
	$id=$_GET["id"];
	$sql = "delete from acudientes where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Acudiente eliminado exitosamente');
	window.location.href='ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('El id acudiente no es valido');
	window.location.href='ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>