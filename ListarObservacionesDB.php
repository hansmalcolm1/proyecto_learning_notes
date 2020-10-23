<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from observacion";
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
	<button><a href="add_observacionDB.php">Agregar observación</a></button>
	<table>
		<tr>
			<th>Id observación</th>
			<th>Observación</th>
			<th>Fecha de la observación</th>
			<th>Id matrícula</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id_observa;?></td>
				<td><?=$p->observacion;?></td>
				<td><?=$p->Fecha_observa;?></td>
				<td><?=$p->registro_matricula_id;?></td>
				<td><button><a href="edit_observacionDB.php?id_observa=<?=$p->id_observa;?>&registro_matricula_id=<?=$p->registro_matricula_id;?>">Editar obsevación</a></button><br><button><a href="eliminar_observacionDB.php?id_observa=<?=$p->id_observa;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>