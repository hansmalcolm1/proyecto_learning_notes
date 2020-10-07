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
	<button><a href="inicio.php">Volver</a></button>
	<table>
		<tr>
			<th>Id observación</th>
			<th>Observación</th>
			<th>Fecha de la observación</th>
			<th>Id matrícula</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id_observa;?></td>
				<td><?=$p->observacion;?></td>
				<td><?=$p->Fecha_observa;?></td>
				<td><?=$p->registro_matricula_id;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>