<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from docente";
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
	<button><a href="add_docenteDB.php">Agregar docente</a></button>
	<table>
		<tr>
			<th>Id docente</th>
			<th>Nombre del docente</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Correo</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id_docente;?></td>
				<td><?=$p->nom_docente;?></td>
				<td><?=$p->direccion;?></td>
				<td><?=$p->telefono;?></td>
				<td><?=$p->correo;?></td>
				<td><button><a href="edit_docenteDB.php?id_docente=<?=$p->id_docente;?>">Editar docente</a></button><br><button><a href="eliminar_docenteDB.php?id_docente=<?=$p->id_docente;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>