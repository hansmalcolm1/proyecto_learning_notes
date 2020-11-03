<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from acudientes";
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
	<?php
	if($rol==1){
	?>
	<button><a href="inicioAdmin.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
	<?php
	}
	?>
		<?php
	else{
	?>
	<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
	<?php
	}
	?>
	
	<?php
	if($rol==1){
	?>
	<button><a href="add_acudienteDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar acudiente</a></button>
	<?php
	}
	?>
	<table>
		<tr>
			<th>Id acudiente</th>
			<th>Documento</th>
			<th>Nombre del acudiente</th>
			<th>Parentesco</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Id alumno</th>
			<?php
			if($rol==1){
			?>
			<th>Opciones</th>
			<?php
			}
			?>
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
				<?php
				if($rol==1){
				?>
				<td><button><a href="edit_acudienteDB.php?id=<?=$p->id;?>&estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar acudiente</a></button><br><button><a href="eliminar_acudienteDB.php?id=<?=$p->id;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
				<?php
				}
				?>
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