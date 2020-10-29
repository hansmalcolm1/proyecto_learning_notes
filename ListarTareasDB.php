<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from tarea";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
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
	<button><a href="inicioAdmin.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
	<button><a href="add_tareaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar tarea</a></button>
	<table>
		<tr>
			<th>Id tarea</th>
			<th>Descripción de la tarea</th>
			<th>Título de la tarea</th>
			<th>Fecha de entrega</th>
			<th>Id materia</th>
			<th>Periodo</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idtarea;?></td>
				<td><?=$p->descripcion_tarea;?></td>
				<td><?=$p->titulo_tarea;?></td>
				<td><?=$p->fecha_entrega;?></td>
				<td><?=$p->materia_idmateria1;?></td>
				<td><?=$p->periodo;?></td>
				<td><button><a href="edit_tareaDB.php?idtarea=<?=$p->idtarea;?>&materia_idmateria1=<?=$p->materia_idmateria1;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar tarea</a></button><br><button><a href="eliminar_tareaDB.php?idtarea=<?=$p->idtarea;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>
<?php
}
else{
	session_unset();

	session_destroy();
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>