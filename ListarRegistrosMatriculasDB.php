<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from registro_matricula";
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
	<button><a href="add_registro_matriculaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar registro matrícula</a></button>
	<table>
		<tr>
			<th>Id registro matrícula</th>
			<th>Id matrícula</th>
			<th>Id alumno</th>
			<th>Id curso</th>
			<th>Promedio</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id;?></td>
				<td><?=$p->Matricula_idMatricula;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><?=$p->curso_idcurso;?></td>
				<td><?=$p->promedio;?></td>
				<td><button><a href="edit_registro_matriculaDB.php?id=<?=$p->id;?>&Matricula_idMatricula=<?=$p->Matricula_idMatricula;?>&estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&curso_idcurso=<?=$p->curso_idcurso;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar registro matrícula</a></button><br><button><a href="eliminar_registro_matriculaDB.php?id=<?=$p->id;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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