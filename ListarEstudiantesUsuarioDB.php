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
	<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
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