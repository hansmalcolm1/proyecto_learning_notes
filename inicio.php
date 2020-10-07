<?php
include("conexion.php");
include("Usuario.php");


echo "Bienvenido usuario <br>";
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<button><a href="index.php?cerrar_session=1">Cerrar Sesión</a></button><br>
	<button><a href="ListarAcudientesUsuarioDB.php">Acudientes</a></button><br>
	<button><a href="ListarCronogramasUsuarioDB.php">Cronogramas</a></button><br>
	<button><a href="ListarCursosUsuarioDB.php">Cursos</a></button><br>
	<button><a href="ListarDefinitivasPeriodosMateriasUsuarioDB.php">Definitivas periodos materias</a></button><br>
	<button><a href="ListarDocentesUsuarioDB.php">Docentes</a></button><br>
	<button><a href="ListarEstudiantesUsuarioDB.php">Estudiantes</a></button><br>
	<button><a href="ListarEstudiantesHasEvaluacionUsuarioDB.php">Estudiante tiene evaluación</a></button><br>
	<button><a href="ListarEstudiantesHasTareaUsuarioDB.php">Estudiante tiene tarea</a></button><br>
	<button><a href="ListarEvaluacionesUsuarioDB.php">Evaluaciones</a></button><br>
	<button><a href="ListarMateriasUsuarioDB.php">Materias</a></button><br>
	<button><a href="ListarMatriculasUsuarioDB.php">Matrículas</a></button><br>
	<button><a href="ListarObservacionesUsuarioDB.php">Observaciones</a></button><br>
	<button><a href="ListarRegistrosMatriculasUsuarioDB.php">Registros matrículas</a></button><br>
	<button><a href="ListarTareasUsuarioDB.php">Tareas</a></button><br>
</body>
</html>