<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idcalificacion"]) && strlen($_GET["idcalificacion"])>0){
	$idcalificacion=$_GET["idcalificacion"];
	$sql = "delete from definitivas_periodo_materia where idcalificacion=:idcalificacion";
	$result = $con->prepare($sql);
	$result->bindParam(":idcalificacion", $idcalificacion);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Definitivas periodo materia eliminadas exitosamente');
	window.location.href='ListarDefinitivasPeriodosMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id calificación no es valido');
	window.location.href='ListarDefinitivasPeriodosMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>