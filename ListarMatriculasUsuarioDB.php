<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from matricula";
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
			<th>Id matrícula</th>
			<th>Condición</th>
			<th>Año lectivo</th>
			<th>Calendario</th>
			<th>Estado</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idMatricula;?></td>
				<td><?=$p->Condicion;?></td>
				<td><?=$p->ano_lectivo;?></td>
				<td><?=$p->calendario;?></td>
				<td><?=$p->estado;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>