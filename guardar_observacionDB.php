<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["observacion"]) && strlen($_POST["observacion"])>0 &&
isset($_POST["Fecha_observa"]) && strlen($_POST["Fecha_observa"])>0 &&
isset($_POST["registro_matricula_id"]) && strlen($_POST["registro_matricula_id"])>0){
	$observacion=$_POST["observacion"];
	$Fecha_observa=$_POST["Fecha_observa"];
	$registro_matricula_id=$_POST["registro_matricula_id"];
	$sql = "insert into observacion (observacion, Fecha_observa, registro_matricula_id) values (:observacion, :Fecha_observa, :registro_matricula_id)";
	$result = $con->prepare($sql);
	$result->bindParam(":observacion", $observacion);
	$result->bindParam(":Fecha_observa", $Fecha_observa);
	$result->bindParam(":registro_matricula_id", $registro_matricula_id);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Observación creada exitosamente');
	window.location.href='ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
else{
	echo "<script>alert('La observación, la fecha de la observación y la matrícula son requeridos');
	window.location.href='ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>