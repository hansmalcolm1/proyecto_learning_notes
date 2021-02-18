<?php
include("conexion.php");
include("Persona.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["nom_docente"]) && strlen($_POST["nom_docente"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono"]) && strlen($_POST["telefono"])>0 &&
isset($_POST["correo"]) && strlen($_POST["correo"])>0 &&
isset($_POST["numero_documento"]) && strlen($_POST["numero_documento"])>0){
	$nom_docente=$_POST["nom_docente"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	$numero_documento=$_POST["numero_documento"];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	$user = substr(str_shuffle($permitted_chars), 0, 10);
	$password = md5($user);
	$sql = "insert into usuarios (usuario, password, rol_id) values (:usuario, :password, 3)";
	$result = $con->prepare($sql);
	$result->bindParam(":usuario", $user);
	$result->bindParam(":password", $password);
	$result->execute();
	$sql2 = "select * from usuarios order by id_us desc limit 1";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$result3 = $result2->fetchObject("Persona");
	$id_usuario1 = $result3->id_us;
	$sql3 = "insert into docente (nom_docente, direccion, telefono, correo, numero_documento, id_usuario1) values (:nom_docente, :direccion, :telefono, :correo, :numero_documento, :id_usuario1)";
	$result3 = $con->prepare($sql3);
	$result3->bindParam(":nom_docente", $nom_docente);
	$result3->bindParam(":direccion", $direccion);
	$result3->bindParam(":telefono", $telefono);
	$result3->bindParam(":correo", $correo);
	$result3->bindParam(":numero_documento", $numero_documento);
	$result3->bindParam(":id_usuario1", $id_usuario1);
	$result3->execute();
	$con=NULL;
	echo "<script>alert('Docente creado exitosamente');
	window.location.href='ListarDocentesDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El nombre del docente, la dirección, el teléfono, el correo, el número del documento y el usuario son requeridos');
	window.location.href='ListarDocentesDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>