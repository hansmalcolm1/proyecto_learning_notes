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
	<button><a href="inicioAdmin.php">Volver</a></button>
	<button><a href="add_estudiante_has_tareaDB.php">Agregar estudiante tiene tarea</a></button>
	<table>
		<tr>
			<th>Id estudiante tiene tarea</th>
			<th>Id estudiante</th>
			<th>Id tarea</th>
			<th>Nota</th>
			<th>Obsevación</th>
			<th>Opciones</th>
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
				<td><button><a href="edit_estudiante_has_tareaDB.php?id_est_tarea=<?=$p->id_est_tarea;?>&estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&tarea_idtarea=<?=$p->tarea_idtarea;?>">Editar estudiante tiene tarea</a></button><br><button><a href="eliminar_estudiante_has_tareaDB.php?id_est_tarea=<?=$p->id_est_tarea;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>