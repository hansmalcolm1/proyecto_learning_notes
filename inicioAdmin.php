<?php
include("conexion.php");
include("Usuario.php");
session_start();
echo "<center><h1>Bienvenido admin</h1></center><br>";
error_reporting(0);
if(isset($_SESSION['username'])&&isset($_SESSION['rol'])){
$sesion=$_SESSION['username'];
$rol=$_SESSION['rol'];
}
if($sesion==null && $rol==null){
	$sesion=$_GET['sesion'];
	$rol=$_GET['rol'];
}
if(!($sesion==null) && !($rol==null)){
  if($rol==2){
  header('Location: inicioAdmin.php?sesion=$sesion&rol=1');
  }
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="diseño.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>
      .sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  padding-top: 20px;
}
      .sidenav table{
  text-align:center;
}
.sidenav a {
  padding: 6px 6px 6px 6px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}

.sidenav h4, .sidenav th{
  color: #FFFFFF;
}
.sidenav a:hover {
  text-decoration: underline;
}

.container {
  margin-left: 300px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="sidenav">
<h4><?=$sesion;?></h4>


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
<br>

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
  <td><button><a href="ListarEstudianteHasCursoDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene curso</a></button></td>
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
<td><button><a href="ListarSubirTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Subir tareas</a></button></td>
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
</div>

	<div class="container">
    <h1>Colegio 123</h1>
  <button><a href="index.php?cerrar_session=1" style="color:red; text-align:right;" onclick="cerrar()">Cerrar Sesión</a></button>
     <table class="table table-striped"  border="10" align="center">
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

 <table class="table table-striped"  border="10" align="center">

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
  <td><button><a href="ListarEstudianteHasCursoDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene curso</a></button></td>
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
<td><button><a href="ListarSubirTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Subir tareas</a></button></td>
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
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>