<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idMatricula"]) && strlen($_POST["idMatricula"])>0 &&
isset($_POST["Condicion"]) && strlen($_POST["Condicion"])>0 &&
isset($_POST["ano_lectivo"]) && strlen($_POST["ano_lectivo"])>0 &&
isset($_POST["calendario"]) && strlen($_POST["calendario"])>0 &&
isset($_POST["estado"]) && strlen($_POST["estado"])>0){
	$idMatricula=$_POST["idMatricula"];
	$Condicion=$_POST["Condicion"];
	$ano_lectivo=$_POST["ano_lectivo"];
	$calendario=$_POST["calendario"];
	$estado=$_POST["estado"];
	$sql = "update matricula set idMatricula=:idMatricula, Condicion=:Condicion, ano_lectivo=:ano_lectivo, calendario=:calendario, estado=:estado where idMatricula=:idMatricula";
	$result = $con->prepare($sql);
	$result->bindParam(":idMatricula", $idMatricula);
	$result->bindParam(":Condicion", $Condicion);
	$result->bindParam(":ano_lectivo", $ano_lectivo);
	$result->bindParam(":calendario", $calendario);
	$result->bindParam(":estado", $estado);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Matrícula actualizada exitosamente');
	window.location.href='ListarMatriculasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id matrícula, la condición, el año lectivo, el calendario y el estado son requeridos');
	window.location.href='ListarMatriculasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>