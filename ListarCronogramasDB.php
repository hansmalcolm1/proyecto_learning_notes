<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from cronograma";
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
	<button><a href="add_cronogramaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar cronograma</a></button>
	<table>
		<tr>
			<th>Id cronograma</th>
			<th>Actividad</th>
			<th>Responsable</th>
			<th>Fecha de la actividad</th>
			<th>Id docente</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idcronograma;?></td>
				<td><?=$p->actividad;?></td>
				<td><?=$p->responsable;?></td>
				<td><?=$p->fecha_actividad;?></td>
				<td><?=$p->docente_id_docente;?></td>
				<td><button><a href="edit_cronogramaDB.php?idcronograma=<?=$p->idcronograma;?>&docente_id_docente=<?=$p->docente_id_docente;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar cronograma</a></button><br><button><a href="eliminar_cronogramaDB.php?idcronograma=<?=$p->idcronograma;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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