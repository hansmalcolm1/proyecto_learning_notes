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
	<button><a href="index.php">Volver</a></button>
	<button><a href="add_tareaDB.php">Agregar tarea</a></button>
	<table>
		<tr>
			<th>Id tarea</th>
			<th>Descripción de la tarea</th>
			<th>Título de la tarea</th>
			<th>Fecha de entrega</th>
			<th>Id materia</th>
			<th>Periodo</th>
			<th>Opciones</th>
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
				<td><button><a href="edit_tareaDB.php?idtarea=<?=$p->idtarea;?>&materia_idmateria1=<?=$p->materia_idmateria1;?>">Editar tarea</a></button><br><button><a href="eliminar_tareaDB.php?idtarea=<?=$p->idtarea;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>