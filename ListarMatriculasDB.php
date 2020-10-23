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
	<button><a href="inicioAdmin.php">Volver</a></button>
	<button><a href="add_matriculaDB.php">Agregar matrícula</a></button>
	<table>
		<tr>
			<th>Id matrícula</th>
			<th>Condición</th>
			<th>Año lectivo</th>
			<th>Calendario</th>
			<th>Estado</th>
			<th>Opciones</th>
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
				<td><button><a href="edit_matriculaDB.php?idMatricula=<?=$p->idMatricula;?>">Editar matrícula</a></button><br><button><a href="eliminar_matriculaDB.php?idMatricula=<?=$p->idMatricula;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>