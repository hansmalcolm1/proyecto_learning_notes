<?php
include("conexion.php");
include("Usuario.php");
echo "<br>";
session_start();
error_reporting(0);
if(isset($_SESSION['username'])&&isset($_SESSION['rol'])){
$sesion=$_SESSION['username'];
$rol=$_SESSION['rol'];
}
if($sesion==null && $rol==null){
	$sesion=$_GET['sesion'];
	$rol=$_GET['rol'];
}
//echo "<center><font color='blue'><h3>Bienvenido Usuario</h3></font></center> <br>";
//error_reporting(0);
echo "<marquee bgcolor='blue' behavior='alternate' direction='right'><font color='white' size='8'>Bienvenido Usuario</font></marquee>";
if(!($sesion==null) && !($rol==null)){
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
<style>
    body { background-color: #98F0FC; }
  </style>


</head>
<body >
	<br><br>
	<center>
	<button><a href="index.php?cerrar_session=1" onclick="cerrar()">Cerrar Sesión</a></button><br><br>
	<button><a href="ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Acudientes</a></button><br><br>
	<button><a href="ListarCronogramasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Cronogramas</a></button><br><br>
	<button><a href="ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Cursos</a></button><br><br>
	<button><a href="ListarDefinitivasPeriodosMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Definitivas períodos materias</a></button><br><br>
	<button><a href="ListarDocentesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Docentes</a></button><br><br>
	<button><a href="ListarEstudiantesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiantes</a></button><br><br>
	<button><a href="ListarEstudiantesHasEvaluacionDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene evaluación</a></button><br><br>
	<button><a href="ListarEstudiantesHasTareaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene tarea</a></button><br><br>
	<button><a href="ListarEvaluacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Evaluaciones</a></button><br><br>
	<button><a href="ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Materias</a></button><br><br>
	<button><a href="ListarMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Matrículas</a></button><br><br>
	<button><a href="ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Observaciones</a></button><br><br>
	<button><a href="ListarRegistrosMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Registros matrículas</a></button><br><br>
	<button><a href="ListarTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Tareas</a></button><br>
</center>
</body>
</html>
<script>
function cerrar() {
  <?php
  	session_unset();

	session_destroy();
  ?>
}
</script>
<?php
}
else{
	session_unset();

	session_destroy();
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php?cerrar_session=1'</script>";
}
?>