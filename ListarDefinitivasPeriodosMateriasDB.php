<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from definitivas_periodo_materia, materia, estudiante where materia_idmateria=idmateria and estudiante_id_alumno=id_alumno";
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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

		<?php
	if($rol==1){
		?>
		<button><a href="inicioAdmin.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
		<?php
	}
	if($rol==2){
		?>
		<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
		<?php
	}
	?>
	<button><a href="add_definitivas_periodo_materiaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar definitiva periodo materia</a></button>
		</center>
	<table  border="2" align="center" class="table table-striped">
		<tr>
			<th>Id calificación</th>
			<th>Nota periodo 1</th>
			<th>Nota 2</th>
			<th>Nota 3</th>
			<th>Nota 4</th>
			<th>Definitiva del periodo</th>
			<th>Materia</th>
			<th>Alumno</th>
			<th>Opciones</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idcalificacion;?></td>
				<td><?=$p->nota_periodo_1;?></td>
				<td><?=$p->nota2;?></td>
				<td><?=$p->nota3;?></td>
				<td><?=$p->nota4;?></td>
				<td><?=$p->def_periodo;?></td>
				<td><?=$p->nom_materia;?></td>
				<td><?=$p->nom_alumno;?></td>
				<td><button><a href="edit_definitivas_periodo_materiaDB.php?idcalificacion=<?=$p->idcalificacion;?>&materia_idmateria=<?=$p->materia_idmateria;?>&estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar definitiva periodo materia</a></button><br><button><a href="eliminar_definitivas_periodo_materiaDB.php?idcalificacion=<?=$p->idcalificacion;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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