<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["id_docente"]) && strlen($_POST["id_docente"])>0 &&
isset($_POST["nom_docente"]) && strlen($_POST["nom_docente"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono"]) && strlen($_POST["telefono"])>0 &&
isset($_POST["correo"]) && strlen($_POST["correo"])>0){
	$id_docente=$_POST["id_docente"];
	$nom_docente=$_POST["nom_docente"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	$sql = "update docente set id_docente=:id_docente, nom_docente=:nom_docente, direccion=:direccion, telefono=:telefono, correo=:correo where id_docente=:id_docente";
	$result = $con->prepare($sql);
	$result->bindParam(":id_docente", $id_docente);
	$result->bindParam(":nom_docente", $nom_docente);
	$result->bindParam(":direccion", $direccion);
	$result->bindParam(":telefono", $telefono);
	$result->bindParam(":correo", $correo);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Docente actualizado exitosamente');
	window.location.href='ListarDocentesDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id docente, el nombre del docente, la dirección, el teléfono y el correo son requeridos');
	window.location.href='ListarDocentesDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>