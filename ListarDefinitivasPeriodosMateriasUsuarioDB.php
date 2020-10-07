<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from definitivas_periodo_materia";
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
			<th>Id calificación</th>
			<th>Nota periodo 1</th>
			<th>Nota 2</th>
			<th>Nota 3</th>
			<th>Nota 4</th>
			<th>Definitiva del periodo</th>
			<th>Id materia</th>
			<th>Id alumno</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idcalificacion;?></td>
				<td><?=$p->nota_periodo_1;?></td>
				<td><?=$p->nota2;?></td>
				<td><?=$p->nota3;?></td>
				<td><?=$p->nota4;?></td>
				<td><?=$p->def_periodo;?></td>
				<td><?=$p->materia_idmateria;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>