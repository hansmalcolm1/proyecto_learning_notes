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
	<button><a href="add_registro_matriculaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar registro matrícula</a></button>
</center>
	<table  border="2" align="center" class="table table-striped">
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