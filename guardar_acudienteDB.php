<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["documento"]) && strlen($_POST["documento"])>0 &&
isset($_POST["nombre"]) && strlen($_POST["nombre"])>0 &&
isset($_POST["parentesco"]) && strlen($_POST["parentesco"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono"]) && strlen($_POST["telefono"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0){
	$documento=$_POST["documento"];
	$nombre=$_POST["nombre"];
	$parentesco=$_POST["parentesco"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$sql = "insert into acudientes (documento, nombre, parentesco, direccion, telefono, estudiante_id_alumno) values (:documento, :nombre, :parentesco, :direccion, :telefono, :estudiante_id_alumno)";
	$result = $con->prepare($sql);
	$result->bindParam(":documento", $documento);
	$result->bindParam(":nombre", $nombre);
	$result->bindParam(":parentesco", $parentesco);
	$result->bindParam(":direccion", $direccion);
	$result->bindParam(":telefono", $telefono);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Acudiente creado exitosamente');
	window.location.href='ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";

}
else{
	echo "<script>alert('El documento, el nombre, el parentesco, la dirección, el teléfono y el estudiante son requeridos');
	window.location.href='ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>