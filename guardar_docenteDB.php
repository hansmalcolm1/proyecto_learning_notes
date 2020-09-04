<?php
include("conexion.php");
if(isset($_POST["nom_docente"]) && strlen($_POST["nom_docente"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono"]) && strlen($_POST["telefono"])>0 &&
isset($_POST["correo"]) && strlen($_POST["correo"])>0){
	$nom_docente=$_POST["nom_docente"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	$sql = "insert into docente (nom_docente, direccion, telefono, correo) values (:nom_docente, :direccion, :telefono, :correo)";
	$result = $con->prepare($sql);
	$result->bindParam(":nom_docente", $nom_docente);
	$result->bindParam(":direccion", $direccion);
	$result->bindParam(":telefono", $telefono);
	$result->bindParam(":correo", $correo);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Docente creado exitosamente');
	window.location.href='ListarDocentesDB.php'</script>";
}
else{
	echo "<script>alert('El nombre del docente, la dirección, el teléfono y el correo son requeridos');
	window.location.href='ListarDocentesDB.php'</script>";
}
?>