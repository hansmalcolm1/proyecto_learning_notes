<?php
include("conexion.php");
if(isset($_POST["Condicion"]) && strlen($_POST["Condicion"])>0 &&
isset($_POST["ano_lectivo"]) && strlen($_POST["ano_lectivo"])>0 &&
isset($_POST["calendario"]) && strlen($_POST["calendario"])>0 &&
isset($_POST["estado"]) && strlen($_POST["estado"])>0){
	$Condicion=$_POST["Condicion"];
	$ano_lectivo=$_POST["ano_lectivo"];
	$calendario=$_POST["calendario"];
	$estado=$_POST["estado"];
	$sql = "insert into matricula (Condicion, ano_lectivo, calendario, estado) values (:Condicion, :ano_lectivo, :calendario, :estado)";
	$result = $con->prepare($sql);
	$result->bindParam(":Condicion", $Condicion);
	$result->bindParam(":ano_lectivo", $ano_lectivo);
	$result->bindParam(":calendario", $calendario);
	$result->bindParam(":estado", $estado);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Matrícula creada exitosamente');
	window.location.href='ListarMatriculasDB.php'</script>";
}
else{
	echo "<script>alert('El id matrícula, la condición, el año lectivo, el calendario y el estado son requeridos');
	window.location.href='ListarMatriculasDB.php'</script>";
}
?>