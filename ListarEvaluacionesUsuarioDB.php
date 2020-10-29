<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from evaluacion";
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
	<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
	<table>
		<tr>
			<th>Id evaluación</th>
			<th>Descripción de la evaluación</th>
			<th>Título de la evaluación</th>
			<th>Fecha de la evaluación</th>
			<th>Id materia</th>
			<th>Periodo</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idevaluacion;?></td>
				<td><?=$p->descripcion_evaluacion;?></td>
				<td><?=$p->titulo_evaluacion;?></td>
				<td><?=$p->fecha_evaluacion;?></td>
				<td><?=$p->materia_idmateria1;?></td>
				<td><?=$p->periodo;?></td>
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