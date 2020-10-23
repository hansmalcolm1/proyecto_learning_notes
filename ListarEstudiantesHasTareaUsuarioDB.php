<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from estudiante_has_tarea";
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
			<th>Id estudiante tiene tarea</th>
			<th>Id estudiante</th>
			<th>Id tarea</th>
			<th>Nota</th>
			<th>Obsevación</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id_est_tarea;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><?=$p->tarea_idtarea;?></td>
				<td><?=$p->nota;?></td>
				<td><?=$p->observacion;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>