<?php
include("conexion.php");
include("Usuario.php");
echo "<br>";

//echo "<center><font color='blue'><h3>Bienvenido Usuario</h3></font></center> <br>";

echo "<marquee bgcolor='blue' behavior='alternate' direction='right'><font color='white' size='8'>Bienvenido Usuario</font></marquee>";

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
	<button><a href="index.php?cerrar_session=1">Cerrar Sesión</a></button><br><br>
	<button><a href="ListarAcudientesUsuarioDB.php">Acudientes</a></button><br><br>
	<button><a href="ListarCronogramasUsuarioDB.php">Cronogramas</a></button><br><br>
	<button><a href="ListarCursosUsuarioDB.php">Cursos</a></button><br><br>
	<button><a href="ListarDefinitivasPeriodosMateriasUsuarioDB.php">Definitivas períodos materias</a></button><br><br>
	<button><a href="ListarDocentesUsuarioDB.php">Docentes</a></button><br><br>
	<button><a href="ListarEstudiantesUsuarioDB.php">Estudiantes</a></button><br><br>
	<button><a href="ListarEstudiantesHasEvaluacionUsuarioDB.php">Estudiante tiene evaluación</a></button><br><br>
	<button><a href="ListarEstudiantesHasTareaUsuarioDB.php">Estudiante tiene tarea</a></button><br><br>
	<button><a href="ListarEvaluacionesUsuarioDB.php">Evaluaciones</a></button><br><br>
	<button><a href="ListarMateriasUsuarioDB.php">Materias</a></button><br><br>
	<button><a href="ListarMatriculasUsuarioDB.php">Matrículas</a></button><br><br>
	<button><a href="ListarObservacionesUsuarioDB.php">Observaciones</a></button><br><br>
	<button><a href="ListarRegistrosMatriculasUsuarioDB.php">Registros matrículas</a></button><br><br>
	<button><a href="ListarTareasUsuarioDB.php">Tareas</a></button><br>
</center>
</body>
</html>