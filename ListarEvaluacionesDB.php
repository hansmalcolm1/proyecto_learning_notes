<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from evaluacion";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
?>
<DOCTYPE html>
<html>
<head>
	<style>
		table,th,td {border:black 1px solid;}
		div {text-align:center;}
		table{margin-left:auto;
			margin-right:auto;}
	</style>
	<meta charset="UTF-8">
</head>
<body>
	<div>
	<button><a href="inicioAdmin.php">Volver</a></button>
	<button><a href="add_evaluacionDB.php">Agregar evaluación</a></button>
	<table>
		<tr>
			<th>Id evaluación</th>
			<th>Descripción de la evaluación</th>
			<th>Título de la evaluación</th>
			<th>Fecha de la evaluación</th>
			<th>Id materia</th>
			<th>Periodo</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idevaluacion;?></td>
				<td><?=$p->descripcion_evaluacion;?></td>
				<td><?=$p->titulo_evaluacion;?></td>
				<td><?=$p->fecha_evaluacion;?></td>
				<td><?=$p->materia_idmateria1;?></td>
				<td><?=$p->periodo;?></td>
				<td><button><a href="edit_evaluacionDB.php?idevaluacion=<?=$p->idevaluacion;?>&materia_idmateria1=<?=$p->materia_idmateria1;?>">Editar evaluación</a></button><br><button><a href="eliminar_evaluacionDB.php?idevaluacion=<?=$p->idevaluacion;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>