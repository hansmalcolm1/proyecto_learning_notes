<?php
include("conexion.php");
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["id"]) && strlen($_POST["id"])>0 &&
isset($_POST["documento"]) && strlen($_POST["documento"])>0 &&
isset($_POST["nombre"]) && strlen($_POST["nombre"])>0 &&
isset($_POST["parentesco"]) && strlen($_POST["parentesco"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono"]) && strlen($_POST["telefono"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0){
	$id=$_POST["id"];
	$documento=$_POST["documento"];
	$nombre=$_POST["nombre"];
	$parentesco=$_POST["parentesco"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$sql = "update acudientes set id=:id, documento=:documento, nombre=:nombre, parentesco=:parentesco, direccion=:direccion, telefono=:telefono, estudiante_id_alumno=:estudiante_id_alumno where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->bindParam(":documento", $documento);
	$result->bindParam(":nombre", $nombre);
	$result->bindParam(":parentesco", $parentesco);
	$result->bindParam(":direccion", $direccion);
	$result->bindParam(":telefono", $telefono);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Acudiente actualizado exitosamente');
	window.location.href='ListarAcudientesDB.php'</script>";
}
else{
	echo "<script>alert('El id acudiente, el documento, el nombre, el parentesco, la dirección, el teléfono y el estudiante son requeridos');
	window.location.href='ListarAcudientesDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>