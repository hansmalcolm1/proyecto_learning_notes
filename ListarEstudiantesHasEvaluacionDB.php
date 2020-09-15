<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from estudiante_has_evaluacion";
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
	<button><a href="add_estudiante_has_evaluacionDB.php">Agregar estudiante tiene evaluación</a></button>
	<table>
		<tr>
			<th>Id estudiante tiene evaluación</th>
			<th>Id estudiante</th>
			<th>Id evaluación</th>
			<th>Nota</th>
			<th>Obsevación</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id_est_evalua;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><?=$p->evaluacion_idevaluacion;?></td>
				<td><?=$p->nota;?></td>
				<td><?=$p->observacion;?></td>
				<td><button><a href="edit_estudiante_has_evaluacionDB.php?id_est_evalua=<?=$p->id_est_evalua;?>&estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&evaluacion_idevaluacion=<?=$p->evaluacion_idevaluacion;?>">Editar estudiante tiene evaluación</a></button><br><button><a href="eliminar_estudiante_has_evaluacionDB.php?id_est_evalua=<?=$p->id_est_evalua;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>