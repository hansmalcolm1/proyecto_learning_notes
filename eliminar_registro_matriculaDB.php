<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id"]) && strlen($_GET["id"])>0){
	$id=$_GET["id"];
	$sql = "delete from registro_matricula where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Registro matrícula eliminado exitosamente');
	window.location.href='ListarRegistrosMatriculasDB.php'</script>";
}
else{
	echo "<script>alert('El id registro matrícula no es valido');
	window.location.href='ListarRegistrosMatriculasDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>