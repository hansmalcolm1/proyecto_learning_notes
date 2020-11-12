<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from estudiante_has_tarea";
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
	
	<meta charset="UTF-8">
</head>
<body>
<style type="text/css">
    table th {
        text-align: center;
        background-color:yellow;
    }
    .table  {
        text-align: center;
        background-color:lightgreen;
    }
    .container-fluid{
        background-color:lightblue;
		background-size: cover;
    }
 </style>

<div class="container-fluid">
	<center>
	<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
</center>
	<table  border="2" align="center" class="table table-striped">
		<tr>
			<th>Id estudiante tiene tarea</th>
			<th>Id estudiante</th>
			<th>Id tarea</th>
			<th>Nota</th>
			<th>Obsevación</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id_est_tarea;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><?=$p->tarea_idtarea;?></td>
				<td><?=$p->nota;?></td>
				<td><?=$p->observacion;?></td>
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