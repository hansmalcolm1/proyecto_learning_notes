<?php
include("conexion.php");
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["id_observa"]) && strlen($_POST["id_observa"])>0 &&
isset($_POST["observacion"]) && strlen($_POST["observacion"])>0 &&
isset($_POST["Fecha_observa"]) && strlen($_POST["Fecha_observa"])>0 &&
isset($_POST["registro_matricula_id"]) && strlen($_POST["registro_matricula_id"])>0){
	$id_observa=$_POST["id_observa"];
	$observacion=$_POST["observacion"];
	$Fecha_observa=$_POST["Fecha_observa"];
	$registro_matricula_id=$_POST["registro_matricula_id"];
	$sql = "update observacion set id_observa=:id_observa, observacion=:observacion, Fecha_observa=:Fecha_observa, registro_matricula_id=:registro_matricula_id where id_observa=:id_observa";
	$result = $con->prepare($sql);
	$result->bindParam(":id_observa", $id_observa);
	$result->bindParam(":observacion", $observacion);
	$result->bindParam(":Fecha_observa", $Fecha_observa);
	$result->bindParam(":registro_matricula_id", $registro_matricula_id);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Observación actualizada exitosamente');
	window.location.href='ListarObservacionesDB.php'</script>";
}
else{
	echo "<script>alert('El id observación, la observación, la fecha de la observación y la matrícula son requeridos');
	window.location.href='ListarObservacionesDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>