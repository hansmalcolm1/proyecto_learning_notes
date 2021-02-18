<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["id_docente"]) && strlen($_POST["id_docente"])>0 &&
isset($_POST["nom_docente"]) && strlen($_POST["nom_docente"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono"]) && strlen($_POST["telefono"])>0 &&
isset($_POST["correo"]) && strlen($_POST["correo"])>0 &&
isset($_POST["numero_documento"]) && strlen($_POST["numero_documento"])>0 &&
isset($_POST["id_usuario1"]) && strlen($_POST["id_usuario1"])>0){
	$id_docente=$_POST["id_docente"];
	$nom_docente=$_POST["nom_docente"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	$numero_documento=$_POST["numero_documento"];
	$id_usuario1=$_POST["id_usuario1"];
	$sql = "update docente set id_docente=:id_docente, nom_docente=:nom_docente, direccion=:direccion, telefono=:telefono, correo=:correo, numero_documento=:numero_documento, id_usuario1=:id_usuario1 where id_docente=:id_docente";
	$result = $con->prepare($sql);
	$result->bindParam(":id_docente", $id_docente);
	$result->bindParam(":nom_docente", $nom_docente);
	$result->bindParam(":direccion", $direccion);
	$result->bindParam(":telefono", $telefono);
	$result->bindParam(":correo", $correo);
	$result->bindParam(":numero_documento", $numero_documento);
	$result->bindParam(":id_usuario1", $id_usuario1);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Docente actualizado exitosamente');
	window.location.href='ListarDocentesDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id docente, el nombre del docente, la dirección, el teléfono, el correo, el numero del documento y el id usuario son requeridos');
	window.location.href='ListarDocentesDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>