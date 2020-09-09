<?php
require "conexion.php";
require "Persona.php";

$sql = "select * from materia";
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
	<button><a href="add_materiaDB.php">Agregar materia</a></button>
	<table>
		<tr>
			<th>Id materia</th>
			<th>Nombre de la materia</th>
			<th>Id curso</th>
			<th>Id docente</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idmateria;?></td>
				<td><?=$p->nom_materia;?></td>
				<td><?=$p->curso_idcurso;?></td>
				<td><?=$p->docente_id_docente;?></td>
				<td><button><a href="edit_materiaDB.php?idmateria=<?=$p->idmateria;?>&curso_idcurso=<?=$p->curso_idcurso;?>&docente_id_docente=<?=$p->docente_id_docente;?>">Editar materia</a></button><br><button><a href="eliminar_materiaDB.php?idmateria=<?=$p->idmateria;?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>