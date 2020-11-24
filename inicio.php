<?php
require "conexion.php";
require "Persona.php";
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

$sql = "select * from estudiante, usuarios where id_usuario=id and usuario=:usuario";
  $result = $con->prepare($sql);
  $result->bindParam(":usuario", $sesion);
  $result->execute();
  $p = $result->fetchObject("Persona");
//echo "<center><font color='blue'><h3>Bienvenido Usuario</h3></font></center> <br>";
//error_reporting(0);
echo "<marquee bgcolor='blue' behavior='alternate' direction='right'><font color='white' size='8'>Bienvenido Usuario</font></marquee>";

if(!($sesion==null) && !($rol==null)){
  if($rol==1){
    header('Location: inicioAdmin.php?sesion=$sesion&rol=1');
  }
  if($p==true){
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
<br>

<div class="container">
 <table class="table table-striped"  border="2" align="center">
<thead>
<tr>
  <th>Módulo Docente</th>
</tr>
</thead>
<tbody>
<tr>
  <td><button><a href="ListarDocentesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Docentes</a></button></td>
 </tr>
 
  <tr>
  <td><button><a href="ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Cursos</a></button></td>
  </tr>
 <tr>
  <td><button><a href="ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Materias</a></button></td>
</tr>

<tr>
<td><button><a href="ListarCronogramasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Cronogramas</a></button></td>
</tr>

<tr>
	<td><button><a href="ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Observaciones</a></button></td>
</tr>

<tr>
	<td><button><a href="ListarDefinitivasPeriodosMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Definitivas periodos materias</a></button></td>
</tr>



</tbody>
</table>
<br><br>

<table class="table table-striped"  border="2" align="center">
<thead>
<tr>
  <th>Módulo Estudiante</th>
</tr>
</thead>
<tbody>
<tr>
  <td><button><a href="ListarEstudiantesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiantes</a></button></td>
 </tr>
 
  <tr>
  <td><button><a href="ListarEstudiantesHasEvaluacionDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene evaluación</a></button></td>
  </tr>
 <tr>
  <td><button><a href="ListarEstudiantesHasTareaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene tarea</a></button></td>
</tr>

<tr>
<td><button><a href="ListarEvaluacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Evaluaciones</a></button></td>
</tr>

<tr>
<td><button><a href="ListarTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Tareas</a></button></td>
</tr>

<tr>
	<td><button><a href="ListarMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Matrículas</a></button></td>
</tr>

<tr>
	<td><button><a href="ListarRegistrosMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Registros matrículas</a></button></td>
</tr>

<tr>
<td><button><a href="ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Acudientes</a></button></td>
</tr>

</tbody>
</table>


<center>
<button type="button" class="btn btn-link" ><a href="index.php?cerrar_session=1" onclick="cerrar()"><h2>Cerrar Sesión</h2></a></button><br><br>

</center>

</div>
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
	echo "<script>alert('El usuario no tiene asignado un estudiante');
	window.location.href='index.php?cerrar_session=1'</script>";
}
}
else{
  session_unset();

  session_destroy();
  echo "<script>alert('No tiene permisos');
  window.location.href='index.php?cerrar_session=1'</script>";
}
?>