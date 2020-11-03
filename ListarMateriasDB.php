<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from materia";
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
	<button><a href="add_materiaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar materia</a></button>
	<?php
	}
	?>
	
	<table>
		<tr>
			<th>Id materia</th>
			<th>Nombre de la materia</th>
			<th>Id curso</th>
			<th>Id docente</th>
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
				<td><?=$p->idmateria;?></td>
				<td><?=$p->nom_materia;?></td>
				<td><?=$p->curso_idcurso;?></td>
				<td><?=$p->docente_id_docente;?></td>
					<?php
	if($rol==1){
	?>
	<td><button><a href="edit_materiaDB.php?idmateria=<?=$p->idmateria;?>&curso_idcurso=<?=$p->curso_idcurso;?>&docente_id_docente=<?=$p->docente_id_docente;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar materia</a></button><br><button><a href="eliminar_materiaDB.php?idmateria=<?=$p->idmateria;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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