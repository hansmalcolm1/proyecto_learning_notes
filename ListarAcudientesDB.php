<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from acudientes";
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
	<button><a href="add_acudienteDB.php">Agregar acudiente</a></button>
	<table>
		<tr>
			<th>Id acudiente</th>
			<th>Documento</th>
			<th>Nombre del acudiente</th>
			<th>Parentesco</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Id alumno</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id;?></td>
				<td><?=$p->documento;?></td>
				<td><?=$p->nombre;?></td>
				<td><?=$p->parentesco;?></td>
				<td><?=$p->direccion;?></td>
				<td><?=$p->telefono;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><button><a href="edit_acudienteDB.php?id=<?=$p->id;?>&estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>">Editar acudiente</a></button><br><button><a href="eliminar_acudienteDB.php?id=<?=$p->id;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>