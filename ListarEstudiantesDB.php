<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from estudiante";
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
	<button><a href="add_estudianteDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar estudiante</a></button>
	<?php
	}
	?>
	
	<table>
		<tr>
			<th>Id alumno</th>
			<th>Nombre del alumno</th>
			<th>Documento</th>
			<th>Celular</th>
			<th>Email</th>
			<th>Fecha de nacimiento</th>
			<th>Dirección</th>
			<th>Teléfono fijo</th>
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
				<td><?=$p->id_alumno;?></td>
				<td><?=$p->nom_alumno;?></td>
				<td><?=$p->documento;?></td>
				<td><?=$p->celular;?></td>
				<td><?=$p->email;?></td>
				<td><?=$p->fecha_nacimiento;?></td>
				<td><?=$p->direccion;?></td>
				<td><?=$p->telefono_fijo;?></td>
					<?php
	if($rol==1){
	?>
	<td><button><a href="edit_estudianteDB.php?id_alumno=<?=$p->id_alumno;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar estudiante</a></button><br><button><a href="eliminar_estudianteDB.php?id_alumno=<?=$p->id_alumno;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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