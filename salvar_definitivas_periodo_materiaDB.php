<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["idcalificacion"]) && strlen($_POST["idcalificacion"])>0 &&
isset($_POST["nota_periodo_1"]) && strlen($_POST["nota_periodo_1"])>0 &&
isset($_POST["nota2"]) && strlen($_POST["nota2"])>0 &&
isset($_POST["nota3"]) && strlen($_POST["nota3"])>0 &&
isset($_POST["nota4"]) && strlen($_POST["nota4"])>0 &&
isset($_POST["def_periodo"]) && strlen($_POST["def_periodo"])>0 &&
isset($_POST["materia_idmateria"]) && strlen($_POST["materia_idmateria"])>0 &&
isset($_POST["estudiante_id_alumno"]) && strlen($_POST["estudiante_id_alumno"])>0){
	$idcalificacion=$_POST["idcalificacion"];
	$nota_periodo_1=$_POST["nota_periodo_1"];
	$nota2=$_POST["nota2"];
	$nota3=$_POST["nota3"];
	$nota4=$_POST["nota4"];
	$def_periodo=$_POST["def_periodo"];
	$materia_idmateria=$_POST["materia_idmateria"];
	$estudiante_id_alumno=$_POST["estudiante_id_alumno"];
	$sql = "update definitivas_periodo_materia set idcalificacion=:idcalificacion, nota_periodo_1=:nota_periodo_1, nota2=:nota2, nota3=:nota3, nota4=:nota4, def_periodo=:def_periodo, materia_idmateria=:materia_idmateria, estudiante_id_alumno=:estudiante_id_alumno where idcalificacion=:idcalificacion";
	$result = $con->prepare($sql);
	$result->bindParam(":idcalificacion", $idcalificacion);
	$result->bindParam(":nota_periodo_1", $nota_periodo_1);
	$result->bindParam(":nota2", $nota2);
	$result->bindParam(":nota3", $nota3);
	$result->bindParam(":nota4", $nota4);
	$result->bindParam(":def_periodo", $def_periodo);
	$result->bindParam(":materia_idmateria", $materia_idmateria);
	$result->bindParam(":estudiante_id_alumno", $estudiante_id_alumno);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Definitivas periodo materia actualizadas exitosamente');
	window.location.href='ListarDefinitivasPeriodosMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id calificación, la nota del periodo 1, la nota 2, la nota 3, la nota 4, la definitiva del periodo, la materia y el estudiante son requeridos');
	window.location.href='ListarDefinitivasPeriodosMateriasDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>