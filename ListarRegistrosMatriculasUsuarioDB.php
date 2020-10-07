<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from registro_matricula";
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
			<th>Id registro matrícula</th>
			<th>Id matrícula</th>
			<th>Id alumno</th>
			<th>Id curso</th>
			<th>Promedio</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id;?></td>
				<td><?=$p->Matricula_idMatricula;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><?=$p->curso_idcurso;?></td>
				<td><?=$p->promedio;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>