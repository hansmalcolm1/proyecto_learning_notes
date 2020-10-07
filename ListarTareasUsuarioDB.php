<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from tarea";
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
	<button><a href="inicio.php">Volver</a></button>
	<table>
		<tr>
			<th>Id tarea</th>
			<th>Descripción de la tarea</th>
			<th>Título de la tarea</th>
			<th>Fecha de entrega</th>
			<th>Id materia</th>
			<th>Periodo</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idtarea;?></td>
				<td><?=$p->descripcion_tarea;?></td>
				<td><?=$p->titulo_tarea;?></td>
				<td><?=$p->fecha_entrega;?></td>
				<td><?=$p->materia_idmateria1;?></td>
				<td><?=$p->periodo;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>