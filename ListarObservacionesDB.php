<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from observacion";
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
	<button><a href="add_observacionDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar observación</a></button>
	<?php
	}
	?>
	
	<table>
		<tr>
			<th>Id observación</th>
			<th>Observación</th>
			<th>Fecha de la observación</th>
			<th>Id matrícula</th>
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
				<td><?=$p->id_observa;?></td>
				<td><?=$p->observacion;?></td>
				<td><?=$p->Fecha_observa;?></td>
				<td><?=$p->registro_matricula_id;?></td>
					<?php
	if($rol==1){
	?>
	<td><button><a href="edit_observacionDB.php?id_observa=<?=$p->id_observa;?>&registro_matricula_id=<?=$p->registro_matricula_id;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar obsevación</a></button><br><button><a href="eliminar_observacionDB.php?id_observa=<?=$p->id_observa;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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