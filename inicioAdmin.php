<?php
include("conexion.php");
include("Usuario.php");

echo "Bienvenido admin<br>";
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<button><a href="index.php?cerrar_session=1">Cerrar Sesión</a></button><br>
	<button><a href="ListarAcudientesDB.php">Acudientes</a></button><br>
	<button><a href="ListarCronogramasDB.php">Cronogramas</a></button><br>
	<button><a href="ListarCursosDB.php">Cursos</a></button><br>
	<button><a href="ListarDefinitivasPeriodosMateriasDB.php">Definitivas periodos materias</a></button><br>
	<button><a href="ListarDocentesDB.php">Docentes</a></button><br>
	<button><a href="ListarEstudiantesDB.php">Estudiantes</a></button><br>
	<button><a href="ListarEstudiantesHasEvaluacionDB.php">Estudiante tiene evaluación</a></button><br>
	<button><a href="ListarEstudiantesHasTareaDB.php">Estudiante tiene tarea</a></button><br>
	<button><a href="ListarEvaluacionesDB.php">Evaluaciones</a></button><br>
	<button><a href="ListarMateriasDB.php">Materias</a></button><br>
	<button><a href="ListarMatriculasDB.php">Matrículas</a></button><br>
	<button><a href="ListarObservacionesDB.php">Observaciones</a></button><br>
	<button><a href="ListarRegistrosMatriculasDB.php">Registros matrículas</a></button><br>
	<button><a href="ListarTareasDB.php">Tareas</a></button><br>
</body>
</html>