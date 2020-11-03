<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from docente";
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
	<button><a href="add_docenteDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar docente</a></button>
	<?php
	}
	?>
	
	<table>
		<tr>
			<th>Id docente</th>
			<th>Nombre del docente</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Correo</th>
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
				<td><?=$p->id_docente;?></td>
				<td><?=$p->nom_docente;?></td>
				<td><?=$p->direccion;?></td>
				<td><?=$p->telefono;?></td>
				<td><?=$p->correo;?></td>
					<?php
	if($rol==1){
	?>
	<td><button><a href="edit_docenteDB.php?id_docente=<?=$p->id_docente;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar docente</a></button><br><button><a href="eliminar_docenteDB.php?id_docente=<?=$p->id_docente;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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